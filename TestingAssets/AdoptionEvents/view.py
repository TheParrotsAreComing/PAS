import time
import sys
import _mysql
import random
import string
import re

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

	rand_word=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_word2=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_word3=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))

	db.query('INSERT INTO adoption_events (event_date,description,is_deleted) VALUES(NOW(),"'+rand_word+rand_word2+rand_word3+'",0);')
	db.store_result()

	db.query("SELECT id FROM adoption_events where description=\""+rand_word+rand_word2+rand_word3+"\";")

	r=db.store_result()
	k=r.fetch_row(1,1)

	a_id = k[0].get('id')

	driver.get('http://localhost:8765');
	driver.find_element_by_id('email').send_keys('theparrotsarecoming@gmail.com')
	driver.find_element_by_id('password').send_keys('password')
	driver.find_element_by_css_selector('input[type="submit"]').click()

	driver.get('http://localhost:8765/adoption-events/');


	driver.find_element_by_class_name('upcoming-tab').click()

	if 'event'+a_id in driver.page_source:
		print('pass')
	else:
		print('fail')

	driver.quit()

except Exception as e:
	print(e)
	print("Adoption Event does not appear to be in database")
