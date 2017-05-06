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


	#| cat_id            | int(11)    | NO   | MUL | NULL    |                |
	#| is_fvrcp          | tinyint(1) | YES  |     | NULL    |                |
	#| is_deworm         | tinyint(1) | YES  |     | NULL    |                |
	#| is_flea           | tinyint(1) | YES  |     | NULL    |                |
	#| is_rabies         | tinyint(1) | YES  |     | NULL    |                |
	#| is_other          | tinyint(1) | YES  |     | NULL    |                |
	#| administered_date | date       | NO   |     | NULL    |                |
	#| notes             | text       | YES  |     | NULL    |                |

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


	# data-ix="medical-notification"
	med_btn = driver.find_element_by_css_selector('a[data-ix="medical-notification"]')
	med_btn.click()


	med_btn = driver.find_element_by_css_selector('div.medical-data-cont[data-mh="'+med_id+'"]')
	med_btn.click()

	edit_btn = driver.find_element_by_css_selector('a.left.medical-data-action[data-mh="'+med_id+'"]')
	edit_btn.location_once_scrolled_into_view
	edit_btn.click()

	notes = driver.find_element_by_id('notes')
	notes.clear()

	rand_1=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_2=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(7))
	rand_3=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(8))

	notes.send_keys(rand_1+" "+rand_2+" "+rand_3)
	
	submit = driver.find_element_by_css_selector('input[type="submit"]')
	submit.click()
	
	med_btn = driver.find_element_by_css_selector('a[data-ix="medical-notification"]')
	med_btn.click()
	med_notes = driver.find_element_by_css_selector('div.medical-data-notes')
	if(med_notes.text == rand_1+" "+rand_2+" "+rand_3):
		print('pass')

	driver.quit()

except Exception as e:
	print(e)
	print("fail")
	driver.quit()

