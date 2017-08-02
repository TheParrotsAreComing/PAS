import time
import sys
import _mysql
import random
import string
import re
import os
import traceback


from selenium import webdriver
from selenium.webdriver.support.ui import Select
from selenium.webdriver.common.keys import Keys
import selenium.webdriver.chrome.service as service


service = service.Service('D:\ChromeDriver\chromedriver')
service.start()
capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone

driver = webdriver.Remote(service.service_url, capabilities)

try:
	# Check to see if it was added
	db=_mysql.connect('localhost','root','root','paws_db')
	rand_fname=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_lname=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_mail=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))


	db.query("INSERT INTO fosters (first_name,last_name,address,email,created,is_deleted) VALUES(\""+rand_fname+"\",\""+rand_lname+"\",\"55 Gato Way\",\""+rand_mail+"@mail.com\",NOW(),true);");
	db.store_result()

	db.query("SELECT id,first_name FROM fosters where last_name=\""+rand_lname+"\" AND email=\""+rand_mail+"@mail.com\"")

	r=db.store_result()

	k=r.fetch_row(1,1)
	a_id = k[0].get('id')


	driver.set_window_size(sys.argv[1], sys.argv[2]);

	driver.get('http://localhost:8765');
	driver.find_element_by_id('email').send_keys('theparrotsarecoming@gmail.com')
	driver.find_element_by_id('password').send_keys('password')
	driver.find_element_by_css_selector('input[type="submit"]').click()

	driver.get('http://localhost:8765/fosters/view/'+a_id);


	upload_elem = driver.find_element_by_css_selector('a[data-ix="attachment-notification"]')
	upload_elem.click()

	driver.find_element_by_css_selector('a[data-ix="add-file-click-desktop"]').click()
	
	browse = driver.find_element_by_id("uploaded-file")
	browse.send_keys(os.getcwd()+"/doc/test_doc_1.pdf")

	driver.find_element_by_id('file-note').send_keys(Keys.RETURN)

	src = driver.page_source

	if 'test_doc_1.pdf' in src:
		print("pass")
	else:
		print('fail')

	
except Exception as e:
	traceback.print_exc()
	print(e)
	print("fail")

finally:
	driver.quit()
