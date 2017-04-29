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

	driver.get('http://localhost:8765/cats/edit/'+cat_id);


	name = driver.find_element_by_name("cat_name")
	cat_name = name.get_attribute("value")

	new_rand_name=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))

	name.clear()
	name.send_keys(new_rand_name);

	driver.find_element_by_id("CatAdd").click()

	if rand_name == cat_name:
		db.query("SELECT cat_name FROM cats where id="+cat_id)
		r=db.store_result()
		k=r.fetch_row(1,1)
		new_cat_name = k[0].get('cat_name')
		if new_rand_name == str(new_cat_name,"utf-8"):
			print("pass")
	else:
		print("fail")

except Exception as e:
	print(e)
	print("fail")

driver.quit()
