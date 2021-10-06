import random
data = "Y"
while data == "Y" or data == "y" or data == "yes" or data == "Yes" or data == "YES":
    c, p, count = 0, 0, 0
    while count < 5:
        i = input("Rock(r), Paper(p) or Scissor(s)?\n")
        if i == "r":
            print("PLAYER INPUT : ROCK")
        elif i == "p":
            print("PLAYER INPUT : PAPER")
        else:
            print("PLAYER INPUT : SCISSOR")
        k = random.randint(1, 3)
        if k == 1:
            print("COMPUTER INPUT : ROCK")
        elif k == 2:
            print("COMPUTER INPUT : PAPER")
        else:
            print("COMPUTER INPUT : SCISSOR")
        if k == 1 and i == "r":
            print("DRAW!")
        elif k == 1 and i == "p":
            print("PLAYER WINS!")
            p += 1
        elif k == 1 and i == "s":
            print("COMPUTER WINS!")
            c += 1
        elif k == 2 and i == "p":
            print("DRAW!")
        elif k == 2 and i == "s":
            print("PLAYER WINS!")
            p += 1
        elif k == 2 and i == "r":
            print("COMPUTER WINS!")
            c += 1
        elif k == 3 and i == "s":
            print("DRAW!")
        elif k == 3 and i == "r":
            print("PLAYER WINS!")
            p += 1
        elif k == 3 and i == "p":
            print("COMPUTER WINS!")
            c += 1
        count += 1
    print("\t-----FINAL SCORE-----")
    print("\tPLAYER -> "+str(p))
    print("\tCOMPUTER -> "+str(c))
    if p>c:
        print("PLAYER WINS!\nCONGRATULATIONS!!")
    elif p<c:
        print("COMPUTER WINS!\nBETTER LUCK NEXT TIME :(")
    else:
        print("IT'S A TIE!")
    data = input("Do you want to play again? \n")
