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
	rand_KC=''.join(random.choice(string.digits) for _ in range(4))
	rand_name1=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_name2=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
	rand_val=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))


	db.query('INSERT INTO litters(kc_ref_id, litter_name, the_cat_count, kitten_count, dob, asn_start, asn_end, est_arrival, breed, foster_notes, notes, created, is_deleted) VALUES('+rand_KC+', "'+rand_name1+'", 0, 0, "2017-02-14", "2017-03-14", "2017-03-21", "Early/Mid March", "Calico minx tabby mixes", "This litter is no longer coming in, hence why it\'s deleted", "Other litter notes... needs etc.", NOW(),true);');

	db.store_result()

	db.query('SELECT id FROM litters where kc_ref_id="'+rand_KC+'" AND litter_name="'+rand_name1+'";')

	r=db.store_result()

	k=r.fetch_row(1,1)
	litter_id = k[0].get('id')


	service = service.Service('D:\ChromeDriver\chromedriver')
	service.start()
	capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone

	driver = webdriver.Remote(service.service_url, capabilities)

	driver.set_window_size(sys.argv[1], sys.argv[2]);

	driver.get('http://localhost:8765/litters/view/'+litter_id);
	
	l_name_elem = driver.find_element_by_id("litterName")
	l_name= l_name_elem.text

	if l_name == rand_name1:
		print("pass")
	else:
		print("fail")

	driver.quit()
except Exception as e:
	print(e)
	print("fail")

