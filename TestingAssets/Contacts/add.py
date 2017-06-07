import time
import sys
import _mysql
import random
import string
import re


from selenium import webdriver
from selenium.webdriver.support.ui import Select
import selenium.webdriver.chrome.service as service

service = service.Service('D:\ChromeDriver\chromedriver')
service.start()
capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone

driver = webdriver.Remote(service.service_url, capabilities)
driver.set_window_size(sys.argv[1], sys.argv[2]);

driver.get('http://localhost:8765');
driver.find_element_by_id('email').send_keys('theparrotsarecoming@gmail.com')
driver.find_element_by_id('password').send_keys('password')
driver.find_element_by_css_selector('input[type="submit"]').click()

driver.get('http://localhost:8765/contacts/add');

rand_name=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(7))
rand_email=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(7))+"@mail.com"
rand_org = ''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(7))
rand_addr = ''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(7))
rand_phone = ''.join(random.choice(string.digits) for _ in range(10))

driver.find_element_by_id('contact-name').send_keys(rand_name)
driver.find_element_by_id('email').send_keys(rand_email);
driver.find_element_by_id('organization').send_keys(rand_org);
driver.find_element_by_id('address').send_keys(rand_addr);
driver.find_element_by_id('Phone').send_keys(rand_phone);

driver.find_element_by_css_selector('input[type="submit"]').click()

driver.quit()

# Check to see if it was added
db=_mysql.connect('localhost','root','root','paws_db')
db.query('SELECT id,contact_name FROM contacts where email="'+rand_email+'";')

r=db.store_result()

k=r.fetch_row(1,1)

if not k:
	print('fail')
	sys.exit(0)

name = str(k[0].get('contact_name'),'utf-8')

if  rand_name in name:
	print('pass')
else:
	print('fail')

#if sql_email == l_name+"@"+f_name+".net":
	#db.query('DELETE FROM fosters where first_name="'+f_name+'" AND last_name="'+l_name+'";')

