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
	driver.get('http://localhost:8765');
	driver.find_element_by_id('email').send_keys('theparrotsarecoming@gmail.com')
	driver.find_element_by_id('password').send_keys('password')
	driver.find_element_by_css_selector('input[type="submit"]').click()

	driver.get('http://localhost:8765/adoption-events/add');


	month = Select(driver.find_element_by_id('month'));
	day = Select(driver.find_element_by_id('day'));
	year = Select(driver.find_element_by_id('year'));

	month.select_by_value('01')
	day.select_by_value('01')
	year.select_by_value('2017')

	rand_word=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_word2=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_word3=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))

	driver.find_element_by_id('description').send_keys(rand_word+rand_word2+rand_word3)

	driver.find_element_by_id('catAdd').click()
	driver.find_element_by_class_name('add-cat-btn').click()

	driver.find_element_by_id('userAdd').click()
	driver.find_element_by_class_name('add-user-btn').click()

	driver.find_element_by_id('AdoptionEventAdd').click()

	# Check to see if it was added
	db=_mysql.connect('localhost','root','root','paws_db')
	db.query('SELECT id FROM adoption_events where description="'+rand_word+rand_word2+rand_word3+'";')
	r=db.store_result()

	k=r.fetch_row(1,1)

	if not k:
		print('fail')
	else:
		print('pass')

	driver.quit()

except Exception:
	print("Adoption Event does not appear to be in database")
