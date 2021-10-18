import random

number = random.randint(1, 25)
chances = 0

print("Guess a number (between 1 an 25):")

while chances < 5:
    guess = int(input("Enter Your Guess : "))

    if guess == number:
        print("Congratulation YOU WON!!!")
        exit()
    elif guess < number:
        print("Your guess was too low")
    else:
        print("Your guess was too high")
    chances += 1
    print("chances Left : ",5-chances)

    print("YOU LOSE!!! The number is : ", number)