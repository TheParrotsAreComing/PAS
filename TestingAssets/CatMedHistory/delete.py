import time
import sys
import _mysql
import random
import string
import re

import os


from selenium import webdriver
from selenium.webdriver.support.ui import Select
import selenium.webdriver.chrome.service as service
from selenium.common.exceptions import NoSuchElementException


service = service.Service('D:\ChromeDriver\chromedriver')
service.start()
capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone


driver = webdriver.Remote(service.service_url, capabilities)
driver.set_window_size(sys.argv[1], sys.argv[2]);

try:
	# Check to see if it was added

	db=_mysql.connect('localhost','root','root','paws_db')
	rand_name=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_color=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_coat=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))

	db.query("INSERT INTO cats (cat_name, color, coat,is_kitten, dob, is_female, breed_id, bio, created,is_deleted) VALUES (\""+rand_name+"\",\""+rand_color+"\",\""+rand_coat+"\",1,'2001-03-20',1,1,\"Fast health regeneration, adamantium claws, aggressive...\",NOW(),false);")
	db.store_result()

	db.query("SELECT id,cat_name FROM cats where color=\""+rand_color+"\" AND coat=\""+rand_coat+"\"")

	r=db.store_result()

	k=r.fetch_row(1,1)
	cat_id = k[0].get('id')

	db.query('INSERT INTO cat_medical_histories (cat_id,is_fvrcp,administered_date,notes) VALUES('+cat_id+',1,"2016-04-13","Has a FVRCP");')

	r=db.store_result()

	db.query('SELECT id FROM cat_medical_histories where cat_id='+cat_id+';')

	r=db.store_result()

	k=r.fetch_row(1,1)
	med_id = k[0].get('id')

	driver.get('http://localhost:8765');
	driver.find_element_by_id('email').send_keys('theparrotsarecoming@gmail.com')
	driver.find_element_by_id('password').send_keys('password')
	driver.find_element_by_css_selector('input[type="submit"]').click()

	driver.get('http://localhost:8765/cats/view/'+cat_id);

	#open med histories
	med_btn = driver.find_element_by_css_selector('a[data-ix="medical-notification"]')
	med_btn.click()


	#Find the element we want to delete
	med_btn = driver.find_element_by_css_selector('div.medical-data-cont[data-mh="'+med_id+'"]')
	med_btn.click()

	#choose the delete button
	del_btn = driver.find_element_by_css_selector('a.medical-data-action.delete-record-btn[data-mh="'+med_id+'"]')
	del_btn.location_once_scrolled_into_view
	del_btn.click()


	#confirm the delete
	confirm_btn = driver.find_element_by_id('delMed')
	confirm_btn.location_once_scrolled_into_view
	confirm_btn.click()

	#refresh page to ensure the item was deleted
	driver.refresh();

	#open med histories
	med_btn = driver.find_element_by_css_selector('a[data-ix="medical-notification"]')
	med_btn.click()

	# Does the item still exist?
	med_btn = driver.find_element_by_css_selector('div.medical-data-cont[data-mh="'+med_id+'"]')

	#IF we get here, the element still exists, therefore was not deleted.
	print('fail')
	driver.quit()

except NoSuchElementException:
	#IF we get here, the element was deleted, and we pass
	print("pass")
	driver.quit()

except Exception as e:
	print(e)
	print("fail")
	driver.quit()

