import time
import sys
import _mysql
import random
import string
import re


from selenium import webdriver
from selenium.webdriver.support.ui import Select
import selenium.webdriver.chrome.service as service

from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC


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

	db.query("SELECT id,cat_name FROM cats where cat_name=\""+rand_name+"\"")

	r=db.store_result()

	k=r.fetch_row(1,1)
	cat_id = k[0].get('id')

	rand_fname=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_lname=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_mail=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))


	db.query("INSERT INTO adopters (first_name,last_name,cat_count,address,email,created,is_deleted,do_not_adopt) VALUES(\""+rand_fname+"\",\""+rand_lname+"\",0,\"55 Gato Way\",\""+rand_mail+"@mail.com\",NOW(),false,false);");
	db.store_result()

	db.query("SELECT id,first_name FROM adopters where last_name=\""+rand_lname+"\" AND email=\""+rand_mail+"@mail.com\"")

	r=db.store_result()

	k=r.fetch_row(1,1)
	a_id = k[0].get('id')


	driver.get('http://localhost:8765');
	driver.find_element_by_id('email').send_keys('theparrotsarecoming@gmail.com')
	driver.find_element_by_id('password').send_keys('password')
	driver.find_element_by_css_selector('input[type="submit"]').click()

	driver.get('http://localhost:8765/cats/view/'+cat_id);

	adopter_btn = driver.find_element_by_id("adopterTab")
	adopter_btn.click()

	adopter_add_btn = driver.find_element_by_css_selector("a.attach-adopter")
	adopter_add_btn.click()

	adopter_selected = Select(driver.find_element_by_id('adopter'));
	adopter_selected.select_by_value(a_id);

	confirm_adopt = driver.find_element_by_css_selector("a.add-adopter-btn")
	confirm_adopt.click()

	driver.find_element_by_id('confirmAdopt').click()

	adopter = WebDriverWait(driver, 10).until(
		EC.presence_of_element_located((By.CLASS_NAME, "new-adopter-name"))
	)

	if adopter.text == rand_fname+" "+rand_lname:
		print("pass")
	else:
		print("fail")

except Exception as e:
	print(e)
	print("fail")

finally:
	driver.quit()
