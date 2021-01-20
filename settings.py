import tkinter as tkinter
from tkinter import Label
from tkinter import Entry
from tkinter import Button
import os
fileDir = os.path.dirname(os.path.realpath('__file__'))
varTxt = os.path.join(fileDir, 'var.php')

window = tkinter.Tk()
window.title('Options for Pornhub bot')
window.geometry('1100x200')
window.configure(bg='light gray')

# vars
width = 35
aantalVelden = 20


# Labels
Label(window, text="Snapnaam: ", width='10').grid(column=0, row=1)
Label(window, text="Foto: ", width='10').grid(column=0, row=2)
Label(window, text="Vragen: ", width='10').grid(column=0, row=3)
Label(window, text="Antworden: ", width='10').grid(column=0, row=4)

var = []
with open(varTxt, 'r') as fh:
    for line in fh:
        var.append(str(line))
###############################################################
# Snap namen
snap1 = Entry(window, width=width)
snap1.insert(0, var[1].strip('$snap1 = "').replace('";', '').rstrip())
snap1.grid(column=1, row=1)

snap2 = Entry(window, width=width)
snap2.insert(0, var[2].strip('$snap2 = "').replace('";', '').rstrip())
snap2.grid(column=2, row=1)

snap3 = Entry(window, width=width)
snap3.insert(0, var[3].strip('$snap3 = "').replace('";', '').rstrip())
snap3.grid(column=3, row=1)

snap4 = Entry(window, width=width)
snap4.insert(0, var[4].strip('$snap4 = "').replace('";', '').rstrip())
snap4.grid(column=4, row=1)
###############################################################
# Pictures
pic1 = Entry(window, width=width)
pic1.insert(0, var[5].strip('$pic1 = "').replace('";', '').rstrip())
pic1.grid(column=1, row=2)

pic2 = Entry(window, width=width)
pic2.insert(0, var[6].strip('$pic2 = "').replace('";', '').rstrip())
pic2.grid(column=2, row=2)

pic3 = Entry(window, width=width)
pic3.insert(0, var[7].strip('$pic3 = "').replace('";', '').rstrip())
pic3.grid(column=3, row=2)

pic4 = Entry(window, width=width)
pic4.insert(0, var[8].strip('$pic4 = "').replace('";', '').rstrip())
pic4.grid(column=4, row=2)
###############################################################
# Vragen
vraag1 = Entry(window, width=width)
vraag1.insert(0, var[9].strip('$vraag1 = "').replace('";', '').rstrip())
vraag1.grid(column=1, row=3)

vraag2 = Entry(window, width=width)
vraag2.insert(0, var[10].strip('$vraag2 = "').replace('";', '').rstrip())
vraag2.grid(column=2, row=3)

vraag3 = Entry(window, width=width)
vraag3.insert(0, var[11].strip('$vraag3 = "').replace('";', '').rstrip())
vraag3.grid(column=3, row=3)

vraag4 = Entry(window, width=width)
vraag4.insert(0, var[12].strip('$vraag4 = "').replace('";', '').rstrip())
vraag4.grid(column=4, row=3)
###############################################################
# antworden
var[13] = var[13].strip('$antworden1 = ["').replace('"];', '').rstrip()
x1 = var[13].split(",")
antworden1 = []
col1 = 1
for x in x1:
    antworden1.append(Entry(window, width=width))
    antworden1[col1-1].insert(0, x.replace('"',''))
    antworden1[col1-1].grid(column=col1, row=4)
    col1 += 1

var[14] = var[14].strip('$antworden2 = ["').replace('"];', '').rstrip()
x2 = var[14].split(",")
antworden2 = []
col2 = 1
for x in x2:
    antworden2.append(Entry(window, width=width))
    antworden2[col2-1].insert(0, x.replace('"',''))
    antworden2[col2-1].grid(column=col2, row=6)
    col2 += 1

var[15] = var[15].strip('$antworden3 = ["').replace('"];', '').rstrip()
x3 = var[15].split(",")
antworden3 = []
col3 = 1
for x in x3:
    antworden3.append(Entry(window, width=width))
    antworden3[col3-1].insert(0, x.replace('"',''))
    antworden3[col3-1].grid(column=col3, row=8)
    col3 += 1

###############################################################
# Defs
def quitLoop():
    window.quit()

def add1():
    global col1
    global antworden1
    if col1 <= 4:
        antworden1.append(Entry(window, width=width))
        antworden1[col1-1].grid(column=col1, row=4)
    col1 +=1
    
def add2():
    global col2
    global antworden2
    if col2 <= 4:
        antworden2.append(Entry(window, width=width))
        antworden2[col2-1].grid(column=col2, row=6)
        col2 +=1
    
def add3():
    global col3
    global antworden3
    if col3 <= 4:
        antworden3.append(Entry(window, width=width))
        antworden3[col3-1].grid(column=col3, row=8)
        col3 +=1

###############################################################
# Buttons
btn1 = Button(window, text="Add to antworden1", command=(lambda: add1()))
btn1.grid(column=6, row=4)
btn2 = Button(window, text="Add to antworden2", command=(lambda: add2()))
btn2.grid(column=6, row=6)
btn3 = Button(window, text="Add to antworden3", command=(lambda: add3()))
btn3.grid(column=6, row=8)

# Start button
btn = Button(window, text="Start", command=(lambda: quitLoop()))
btn.grid(column=1, row=9)

window.mainloop()
###############################################################
# Alles terug zetten in var.php

f = open(varTxt, 'w')
f.write(r'<?php' + '\n')
f.close()


var = open(varTxt, 'a')
var.write('$snap1 = "' + snap1.get() + '";\n$snap2 = "' + snap2.get() + '";\n$snap3 = "' + snap3.get() + '";\n$snap4 = "'+  snap4.get() + '";\n')
var.write('$pic1 = "' + pic1.get() + '";\n$pic2 = "' + pic2.get() + '";\n$pic3 = "' + pic3.get() + '";\n$pic4 = "'+  pic4.get() + '";\n')
var.write('$vraag1 = "' + vraag1.get() + '";\n$vraag2 = "' + vraag2.get() + '";\n$vraag3 = "' + vraag3.get() + '";\n$vraag4 = "'+  vraag4.get() + '";\n')
var.write('$antworden1 = [')
c = 1
for antwoord in antworden1:
    if not antwoord.get() == "":
        var.write('"' + antwoord.get() + '"')
        if c == len(antworden1):
            break
        var.write(',')
    c += 1
var.write(']; \n$antworden2 = [')
c = 1
for antwoord in antworden2:
    var.write('"' + antwoord.get() + '"')
    if c == len(antworden2):
        break
    var.write(',')
    c += 1
var.write(']; \n$antworden3 = [')
c = 1
for antwoord in antworden3:
    var.write('"' + antwoord.get() + '"')
    if c == len(antworden3):
        break
    var.write(',')
    c += 1
var.write(']; \n?>')
var.close()