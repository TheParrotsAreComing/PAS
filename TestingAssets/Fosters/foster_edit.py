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
	rand_fname=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_lname=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_mail=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))

	db.query("INSERT INTO fosters (first_name,last_name,phone,address,email,created,is_deleted) VALUES(\""+rand_fname+"\",\""+rand_lname+"\",\"1707255123\",\"55 Gato Way\",\""+rand_mail+"@mail.com\",NOW(),true);");
	db.store_result()

	db.query("SELECT id,first_name FROM fosters where last_name=\""+rand_lname+"\" AND email=\""+rand_mail+"@mail.com\"")

	r=db.store_result()

	k=r.fetch_row(1,1)
	foster_id = k[0].get('id')


	service = service.Service('D:\ChromeDriver\chromedriver')
	service.start()
	capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone

	driver = webdriver.Remote(service.service_url, capabilities)

	driver.set_window_size(sys.argv[1], sys.argv[2]);

	driver.get('http://localhost:8765/fosters/edit/'+foster_id);


	name = driver.find_element_by_id("first-name")
	fname_name = name.get_attribute("value")

	new_rand_name=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))

	name.clear()
	name.send_keys(new_rand_name);

	driver.find_element_by_id("FosterEdit").click()

	db.query("SELECT first_name FROM fosters where id="+foster_id)

	r=db.store_result()
	k=r.fetch_row(1,1)
	new_foster_name = k[0].get('first_name')

	if new_rand_name == str(new_foster_name,"utf-8"):
		print("pass")
	else:
		print("fail")

	driver.quit()
except Exception as e:
	print(e)
	print("fail")

