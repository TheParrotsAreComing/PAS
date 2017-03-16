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

try:
	# Check to see if it was added
	db=_mysql.connect('localhost','root','root','paws_db')
	rand_name=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_color=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_coat=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))

	db.query("INSERT INTO cats (cat_name, color, coat,is_kitten, dob, is_female, breed, bio, created,is_deleted) VALUES (\""+rand_name+"\",\""+rand_color+"\",\""+rand_coat+"\",1,'2001-03-20',1,\"Wolverine\",\"Fast health regeneration, adamantium claws, aggressive...\",NOW(),false);")
	db.store_result()

	db.query("SELECT id,cat_name FROM cats where cat_name=\""+rand_name+"\";")

	r=db.store_result()

	k=r.fetch_row(1,1)
	cat_id = k[0].get('id')

	rand_fname=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_lname=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_mail=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))


	db.query('INSERT INTO fosters(first_name, last_name, phone, address, email, exp, pets, kids, avail, rating, notes, created, is_deleted) VALUES("'+rand_fname+'", "'+rand_lname+'", "4536548764", "Lon Lon Ranch, Hyrule Field", "'+rand_mail+'@mail.com", "Very experienced, has had tons of cats on the ranch.", "Many pets, outdoor farm cats only.", "Many kids of all ages on the ranch.", "Weekends and evenings.", 4, "Malon is used mostly for overflow of cats.", NOW(), true);')

	db.store_result()

	db.query("SELECT id,first_name FROM fosters where last_name=\""+rand_lname+"\" AND email=\""+rand_mail+"@mail.com\"")

	r=db.store_result()

	k=r.fetch_row(1,1)
	a_id = k[0].get('id')


	service = service.Service('D:\ChromeDriver\chromedriver')
	service.start()
	capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone

	driver = webdriver.Remote(service.service_url, capabilities)

	driver.set_window_size(sys.argv[1], sys.argv[2]);

	driver.get('http://localhost:8765/cats/view/'+cat_id);

	foster_btn = driver.find_element_by_id("fosterTab")
	foster_btn.click()

	foster_add_btn = driver.find_element_by_css_selector("a.attach-foster")
	foster_add_btn.click()

	foster_selected = Select(driver.find_element_by_id('foster'));
	foster_selected.select_by_value(a_id);

	confirm_adopt = driver.find_element_by_css_selector("a.add-foster-btn")
	confirm_adopt.click()

	foster = WebDriverWait(driver, 10).until(
		EC.presence_of_element_located((By.CLASS_NAME, "new-foster-name"))
	)

	if foster.text == rand_fname+" "+rand_lname:
		print("pass")
	else:
		print("fail")
	driver.quit()
except Exception as e:
	print(e)
	print("fail")

