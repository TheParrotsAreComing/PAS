import time
import sys
import _mysql
import random
import string
import re


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
	rand_fname=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_lname=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_mail=''.join(random.choice(string.ascii_lowercase + string.digits) for _ in range(6))
	rand_coat=''.join(random.choice(string.ascii_lowercase + string.digits) for _ in range(6))

	db.query("INSERT INTO fosters (first_name,last_name,address,email,created,is_deleted) VALUES(\""+rand_fname+"\",\""+rand_lname+"\",\"55 Gato Way\",\""+rand_mail+"@mail.com\",NOW(),true);");
	db.store_result()

	db.query('SELECT id FROM fosters WHERE first_name="'+rand_fname+'" AND last_name="'+rand_lname+'"')

	r=db.store_result()

	k=r.fetch_row(1,1)
	foster_id = k[0].get('id')

	db.query('INSERT INTO tags (label,color,type_bit,is_deleted) VALUES("'+rand_coat+'","42f44b",001,0)')
	db.store_result()

	db.query('SELECT id FROM tags where label="'+rand_coat+'"')

	r=db.store_result()

	k=r.fetch_row(1,1)
	tag_id = k[0].get('id')

	db.query('INSERT into tags_fosters (foster_id,tag_id) VALUES('+foster_id+','+tag_id+')')


	driver.get('http://localhost:8765');
	driver.find_element_by_id('email').send_keys('theparrotsarecoming@gmail.com')
	driver.find_element_by_id('password').send_keys('password')
	driver.find_element_by_css_selector('input[type="submit"]').click()

	driver.get('http://localhost:8765/fosters/view/'+foster_id);

	ele = driver.find_element_by_css_selector('a.tag-remove[data-id="'+tag_id+'"]')
	ele.click()

	driver.find_element_by_id('delTag').click()

	driver.get('http://localhost:8765/fosters/view/'+foster_id);

	ele = driver.find_element_by_css_selector('a.tag-remove[data-id="'+tag_id+'"]')
	ele.click()

	print('fail')
	driver.quit()

except NoSuchElementException:
    print("pass")

except Exception as e:
	print(e)
	print("fail")

finally:
	driver.quit()
