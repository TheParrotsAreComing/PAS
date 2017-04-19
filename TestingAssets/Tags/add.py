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

driver.get('http://localhost:8765/tags');

tag_name = driver.find_element_by_id('tag')

tag_name.send_keys('seleniumtag')

driver.find_element_by_class_name('add-tag-color').click()

driver.find_element_by_css_selector('input[type="submit"]').click()

for ele in driver.find_elements_by_css_selector('div.index-tag > div.tag-cont > div.tag-text'):
	if(ele.text == 'seleniumtag'):
		print('pass')
