import time
import sys
import _mysql
import random
import string
import re
import os
import traceback


from selenium import webdriver
from selenium.webdriver.support.ui import Select
import selenium.webdriver.chrome.service as service

service = service.Service('D:\ChromeDriver\chromedriver')
service.start()
capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone

driver = webdriver.Remote(service.service_url, capabilities)

driver.set_window_size(sys.argv[1], sys.argv[2]);

try:
	# Check to see if it was added
	db=_mysql.connect('localhost','root','root','paws_db')
	rand_fname=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_lname=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_email=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	password = '$2y$10$bbrOc1AVPlkLaEPO0hoGru31PuhFBaxINt5grsemgaozStRMeLK7C'




	db.query('INSERT INTO users (first_name, last_name, phone, email, address, is_deleted, password, role, new_user, need_new_password, created, modified) VALUES("'+rand_fname+'","'+rand_lname+'",1234567890,"'+rand_email+'@mail.com","123 Home Town Dr. SacTo. Ca 12345",0,"'+password+'",1,0,0,NOW(),NOW())')

	driver.get('http://localhost:8765');
	driver.find_element_by_id('email').send_keys(rand_email+"@mail.com")
	driver.find_element_by_id('password').send_keys('password')
	driver.find_element_by_css_selector('input[type="submit"]').click()

	db.query('SELECT id from users where first_name="'+rand_fname+'" and last_name="'+rand_lname+'";')

	r = db.store_result()

	k = r.fetch_row(1,1)
	user_id = k[0].get('id')

	driver.get('http://localhost:8765/users/view/'+user_id);

	driver.find_element_by_css_selector('a[data-ix="delete-click-desktop"]').click()

	driver.find_element_by_css_selector('a.confirm-button.delete.w-button').click()

	h1s = driver.find_elements_by_css_selector('div.card-h1')
	
	found = False

	for h1 in h1s:
		if(h1.text == rand_fname+" "+rand_lname):
			found = True
	if(found):
		print('fail')
	else:
		print('pass')

	driver.quit()

	
except Exception as e:
	traceback.print_exc()
	print(e)
	print("fail")

