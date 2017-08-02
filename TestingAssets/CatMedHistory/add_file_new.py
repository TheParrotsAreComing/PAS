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

	driver.get('http://localhost:8765');
	driver.find_element_by_id('email').send_keys('theparrotsarecoming@gmail.com')
	driver.find_element_by_id('password').send_keys('password')
	driver.find_element_by_css_selector('input[type="submit"]').click()

	driver.get('http://localhost:8765/cats/view/'+cat_id);


	# data-ix="medical-notification"
	med_btn = driver.find_element_by_css_selector('a[data-ix="medical-notification"]')

	med_btn.click()

	med_add = driver.find_element_by_id('medAdd')
	med_add.click()

	med_option = Select(driver.find_element_by_id('medoption'))

	# select by value 
	med_option.select_by_value(str(1))

	#### DOB Select ###

	#dob month
	month = driver.find_element_by_name('administered_date[month]')
	month.location_once_scrolled_into_view
	administered_date_month = Select(month);

	# select by value 
	administered_date_month.select_by_value('01')

	#dob day
	administered_date_day = Select(driver.find_element_by_name('administered_date[day]'));

	# select by value 
	administered_date_day.select_by_value('01')

	#dob yr
	administered_date_yr = Select(driver.find_element_by_name('administered_date[year]'));

	# select by value 
	administered_date_yr.select_by_value('2012')

	#notes
	notes = driver.find_element_by_id('notes')
	notes.send_keys("This is a test of the non-emergency broadcast system. Please panic, and do nothing. Yell, and grab your babies and children. Fear Everything.")

	#file
	driver.find_element_by_css_selector('input[type="file"]').send_keys(os.getcwd()+"/docs/pdf-sample.pdf")
	driver.find_element_by_id('MHAdd').click()
		
	db.query('SELECT original_filename FROM files WHERE entity_id="'+cat_id+'"')
	r=db.store_result()

	k=r.fetch_row(1,1)
	orig_name = k[0].get('original_filename')

	if str(orig_name,'utf-8') == "pdf-sample.pdf":
		print("pass")
	else:
		print("fail")

except Exception as e:
	print(e)
	print("fail")

