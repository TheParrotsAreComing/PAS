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
	rand_coat=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))

	db.query("INSERT INTO cats (cat_name, color, coat,is_kitten, dob, is_female, breed, bio, created,is_deleted) VALUES (\""+rand_name+"\",\""+rand_color+"\",\""+rand_coat+"\",1,'2001-03-20',1,\"Wolverine\",\"Fast health regeneration, adamantium claws, aggressive...\",NOW(),false);")
	db.store_result()

	db.query("SELECT id,cat_name FROM cats where color=\""+rand_color+"\" AND coat=\""+rand_coat+"\"")

	r=db.store_result()

	k=r.fetch_row(1,1)
	cat_id = k[0].get('id')


	service = service.Service('D:\ChromeDriver\chromedriver')
	service.start()
	capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone

	driver = webdriver.Remote(service.service_url, capabilities)

	driver.set_window_size(sys.argv[1], sys.argv[2]);

	driver.get('http://localhost:8765/cats/index')
	
	elem = driver.find_element_by_id("catNameFilter")
	elem.send_keys(rand_name)
	
	driver.find_element_by_id("searchCatFilter").click()
	
	a = driver.find_element_by_css_selector('a[href="/cats/view/'+cat_id+'"].card > div.card-h1')
	
	if rand_name == a.text:
		print("pass")
	else:
		print("fail")
except:
	print("fail")

driver.quit()
