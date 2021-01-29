import tkinter as tkinter
from tkinter import Label
from tkinter import Entry
from tkinter import Button
from tkinter import PhotoImage
from os import path

fileDir = path.dirname(path.realpath('__file__'))
settingsTxt = path.join(fileDir, 'settings.php')

window = tkinter.Tk()
window.title('Settings')
window.configure(bg='light gray')

width = 35

# Labels
Label(window, text="Snapnaam: ",     width='12').grid(column=0, row=1)
Label(window, text="Foto: ",         width='12').grid(column=0, row=2)
Label(window, text="Vragen: ",       width='12').grid(column=0, row=3)
Label(window, text="Antwoorden 1: ", width='12').grid(column=0, row=4)
Label(window, text="Antwoorden 2: ", width='12').grid(column=0, row=6)
Label(window, text="Antwoorden 3: ", width='12').grid(column=0, row=8)
settings = []
with open(settingsTxt, 'r') as fh:
    for line in fh:
        settings.append(str(line))
###############################################################
# Snaps

snaps = []
i = 1
while i <= 4:
    snap = Entry(window, width=width)
    snap.insert(0, settings[i].strip('$snap' + str(i) + ' = "').replace('";', '').rstrip())
    snap.grid(column=i, row=1)
    snaps.append(snap)
    i += 1

###############################################################
# Pictures

pics = []
i = 1
while i <= 4:
    pic = Entry(window, width=width)
    pic.insert(0, settings[i + 4].strip('$pic' + str(i) + ' = "').replace('";', '').rstrip())
    pic.grid(column=i, row=2)
    pics.append(pic)
    i += 1

###############################################################
# Vragen

vragen = []
i = 1
while i <= 4:
    vraag = Entry(window, width=width)
    vraag.insert(0, settings[i + 8].strip('$vraag' + str(i) + ' = "').replace('";', '').rstrip())
    vraag.grid(column=i, row=3)
    vragen.append(vraag)
    i += 1

###############################################################
# antwoorden

antwoorden = {1: [], 2: [], 3: []}
col = {1: 1, 2: 1, 3: 1}

i = 1
while i <= 3:
    x1 = settings[i + 12].strip('$antwoorden' + str(i) + ' = ["').replace('"];', '').replace('"', '').rstrip().split(",")
    for x in x1:
        antwoorden[i].append(Entry(window, width=width))
        antwoorden[i][col[i]-1].insert(0, x)
        antwoorden[i][col[i]-1].grid(column=col[i], row=(i + 1) * 2)
        col[i] += 1
    i += 1

###############################################################
# Defs
def Save():
    settings = open(settingsTxt, 'w')
    settings.write('<?php\n')
    i = 1
    for snap in snaps:
        settings.write('$snap' + str(i) + ' = "' + snap.get() + '";\n')
        i += 1
    i = 1
    for pic in pics:
        settings.write('$pic' + str(i) + ' = "' + pic.get() + '";\n')
        i += 1
    i = 1
    for vraag in vragen:
        settings.write('$vraag' + str(i) + ' = "' + vraag.get() + '";\n')
        i += 1
    for num in antwoorden:
        c = 1
        settings.write('$antwoorden' + str(num) + ' = [')
        for antwoord in antwoorden[num]:
            if not antwoord.get() == "":
                settings.write('"' + antwoord.get() + '"')
                if c == len(antwoorden[num]):
                    break
                settings.write(',')
            c += 1
        settings.write(']; \n')
    settings.write('?>')
    settings.close()

def quitLoop():
    Save()
    window.quit()

def add(num, row):
    if col[num] <= 4:
        antwoorden[num].append(Entry(window, width=width))
        antwoorden[num][col[num]-1].grid(column=col[num], row=row)
        col[num] +=1

def remove(num):
    antwoorden[num]
    if col[num] > 3:
        antwoorden[num].pop().destroy()
        col[num] -= 1

###############################################################
# Buttons

pixelVirtual = PhotoImage(width=1, height=1)
height = 15
btn1 = Button(window, text="Add", image=pixelVirtual, compound="c", height=height, bg="lightgreen", width=25, borderwidth=1, command=(lambda: add(1, 4)))
btn1.grid(column=6, row=4, padx=(2, 0))
btn2 = Button(window, text="Add", image=pixelVirtual, compound="c", height=height, bg="lightgreen", width=25, borderwidth=1, command=(lambda: add(2, 6)))
btn2.grid(column=6, row=6, padx=(2, 0))
btn3 = Button(window, text="Add", image=pixelVirtual, compound="c", height=height, bg="lightgreen", width=25, borderwidth=1, command=(lambda: add(3, 8)))
btn3.grid(column=6, row=8, padx=(2, 0))
btn4 = Button(window, text="Remove", image=pixelVirtual, compound="c", height=height, bg="firebrick1", width=50, borderwidth=1, command=(lambda: remove(1)))
btn4.grid(column=7, row=4)
btn5 = Button(window, text="Remove", image=pixelVirtual, compound="c", height=height, bg="firebrick1", width=50, borderwidth=1, command=(lambda: remove(2)))
btn5.grid(column=7, row=6)
btn6 = Button(window, text="Remove", image=pixelVirtual, compound="c", height=height, bg="firebrick1", width=50, borderwidth=1, command=(lambda: remove(3)))
btn6.grid(column=7, row=8)

btn = Button(window, text="Save", width=135, command=(lambda: quitLoop()))
btn.grid(row=9, column=0, columnspan=5, pady=(2, 0))
window.mainloop()