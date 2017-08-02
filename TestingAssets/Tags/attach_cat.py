import time
import sys
import _mysql
import random
import string
import re


from selenium import webdriver
from selenium.webdriver.support.ui import Select
import selenium.webdriver.chrome.service as service

try:
	# Check to see if it was added
	db=_mysql.connect('localhost','root','root','paws_db')
	rand_name=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_color=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_coat=''.join(random.choice(string.ascii_lowercase + string.digits) for _ in range(6))

	db.query("INSERT INTO cats (cat_name, color, coat,is_kitten, dob, is_female, breed_id, bio, created,is_deleted) VALUES (\""+rand_name+"\",\""+rand_color+"\",\""+rand_coat+"\",1,'2001-03-20',1,1,\"Fast health regeneration, adamantium claws, aggressive...\",NOW(),false);")
	db.store_result()

	db.query("SELECT id,cat_name FROM cats where color=\""+rand_color+"\" AND coat=\""+rand_coat+"\"")

	r=db.store_result()

	k=r.fetch_row(1,1)
	cat_id = k[0].get('id')

	db.query('INSERT INTO tags (label,color,type_bit,is_deleted) VALUES("'+rand_coat+'","42f44b",100,0)')
	db.store_result()

	db.query('SELECT id FROM tags where label="'+rand_coat+'"')

	r=db.store_result()

	k=r.fetch_row(1,1)
	tag_id = k[0].get('id')


	service = service.Service('D:\ChromeDriver\chromedriver')
	service.start()
	capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone

	driver = webdriver.Remote(service.service_url, capabilities)

	driver.set_window_size(sys.argv[1], sys.argv[2]);

	driver.get('http://localhost:8765');
	driver.find_element_by_id('email').send_keys('theparrotsarecoming@gmail.com')
	driver.find_element_by_id('password').send_keys('password')
	driver.find_element_by_css_selector('input[type="submit"]').click()

	driver.get('http://localhost:8765/cats/view/'+cat_id);

	driver.find_element_by_css_selector('a[data-ix="add-tag"]').click()

	adopter_selected = Select(driver.find_element_by_id('tag'));
	adopter_selected.select_by_value(tag_id);

	driver.find_element_by_class_name('add-tag-btn').click()

	driver.get('http://localhost:8765/cats/view/'+cat_id);

	for ele in driver.find_elements_by_css_selector('div.tag-text'):
		if(ele.text == rand_coat):
			print('pass')
	
	driver.quit()
except Exception as e:
	print(e)
	print("fail")

