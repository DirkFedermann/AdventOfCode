#!/usr/bin/python
# -*- coding: utf-8 -*-
floorNumber = 0
enteredBasement = False
forCounter = 0

with open('AdventOfCode/2015/day1.txt') as f:
    for x in f.read():
        forCounter = forCounter + 1
        if x == '(':
            floorNumber = floorNumber + 1
        if x == ')':
            floorNumber = floorNumber - 1
        if floorNumber < 0 and enteredBasement == False:
            enteredBasement = True
            print ('Entered Basement at Character Position: ',
                   forCounter)

print ('Floornumber: ', floorNumber)
