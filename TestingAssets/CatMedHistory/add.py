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

driver = webdriver.Remote(service.service_url, capabilities)

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


	service = service.Service('D:\ChromeDriver\chromedriver')
	service.start()
	capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone


	driver.set_window_size(sys.argv[1], sys.argv[2]);

	driver.get('http://localhost:8765/cats/view/'+cat_id);


	for med_type in range(5):
		# data-ix="medical-notification"
		med_btn = driver.find_element_by_css_selector('a[data-ix="medical-notification"]')

		med_btn.click()

		med_add = driver.find_element_by_id('medAdd')
		med_add.click()

		med_option = Select(driver.find_element_by_id('medoption'))

		# select by value 
		med_option.select_by_value(str(med_type))

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

		driver.find_element_by_id('MHAdd').click()
		
	med_btn = driver.find_element_by_css_selector('a[data-ix="medical-notification"]')
	med_btn.click()

	none_text = driver.find_element_by_class_name('none-text')

	print(none_text)
	


except NoSuchElementException:
    print("pass")
	driver.quit()

except Exception as e:
	print(e)
	print("fail")

