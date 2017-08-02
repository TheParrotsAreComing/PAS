import time
import sys
import _mysql
import random
import string
import re


from selenium import webdriver
from selenium.webdriver.support.ui import Select
import selenium.webdriver.chrome.service as service
from selenium.webdriver.common.keys import Keys

service = service.Service('D:\ChromeDriver\chromedriver')
service.start()
capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone

driver = webdriver.Remote(service.service_url, capabilities)

try:
	# Check to see if it was added
	db=_mysql.connect('localhost','root','root','paws_db')
	rand_name=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_color=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_coat=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))

	db.query("INSERT INTO cats (cat_name, color, coat,is_kitten, dob, is_female, breed_id, bio, created,is_deleted,is_deceased) VALUES (\""+rand_name+"\",\""+rand_color+"\",\""+rand_coat+"\",1,'2001-03-20',1,1,\"Fast health regeneration, adamantium claws, aggressive...\",NOW(),false,false);")
	db.store_result()

	db.query("SELECT id,cat_name FROM cats where cat_name=\""+rand_name+"\";")

	r=db.store_result()

	k=r.fetch_row(1,1)
	cat_id = k[0].get('id')

	driver.set_window_size(sys.argv[1], sys.argv[2]);

	driver.get('http://localhost:8765');
	driver.find_element_by_id('email').send_keys('theparrotsarecoming@gmail.com')
	driver.find_element_by_id('password').send_keys('password')
	driver.find_element_by_css_selector('input[type="submit"]').click()

	driver.get('http://localhost:8765/cats/index/');

	driver.find_element_by_class_name('cat-filter').click()
	name_input = driver.find_element_by_id('catNameFilter')

	name_input.location_once_scrolled_into_view
	name_input.send_keys(rand_name)
	name_input.send_keys(Keys.RETURN)

	if rand_name in driver.find_element_by_class_name('card-h1').text:
		print('pass')
	else:
		print('fail')

except Exception as e:
	print(e)
	print("fail")

