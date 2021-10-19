# Shri Ganeshay Namah
import pygame
from pygame.locals import *

pygame.init()

screenwidth = 300
screenheight = 300

screen = pygame.display.set_mode((screenwidth, screenheight))
pygame.display.set_caption("ZeroCross")

linewidth = 3
boxes = []
clicked = False
pos = []
player = 1
winner = 0
game_over = False

green = (0, 255, 0)
red = (255, 0, 0)
blue = (0, 0, 255)

font = pygame.font.SysFont(None, 25)
again_rect = Rect(screenwidth//2-80, screenheight//2, 160, 50)


def draw_grid():
    bg = (255, 255, 200)
    grid = (50, 50, 50)
    screen.fill(bg)
    for x in range(1, 3):
        pygame.draw.line(screen, grid, (0, x*100), (screenwidth, x*100), linewidth)
        pygame.draw.line(screen, grid, (x*100, 0), (x*100, screenheight), linewidth)


for x in range(3):
    row = [0]*3
    boxes.append(row)


def draw_boxes():
    x_pos = 0
    for x in boxes:
        y_pos = 0
        for y in x:
            if y == 1:
                pygame.draw.line(screen, green, (x_pos*100+15, y_pos*100+15), (x_pos*100+85, y_pos*100+85), linewidth)
                pygame.draw.line(screen, green, (x_pos*100+15, y_pos*100+85), (x_pos*100+85, y_pos*100+15), linewidth)
            if y == -1:
                pygame.draw.circle(screen, red, (x_pos*100+50, y_pos*100+50), 38, linewidth)
            y_pos += 1
        x_pos += 1


def check_win():
    global winner
    global game_over

    y_pos = 0
    for x in boxes:
        # check columns
        if sum(x) == 3:
            winner = 1
            game_over = True
        if sum(x) == -3:
            winner = 2
            game_over = True
        # check rows
        if boxes[0][y_pos] + boxes[1][y_pos] + boxes[2][y_pos] == 3:
            winner = 1
            game_over = True
        if boxes[0][y_pos] + boxes[1][y_pos] + boxes[2][y_pos] == -3:
            winner = 2
            game_over = True
        y_pos += 1
    # check diagonals
    if boxes[0][0] + boxes[1][1] + boxes[2][2] == 3 or boxes[2][0] + boxes[1][1] + boxes[0][2] == 3:
        winner = 1
        game_over = True
    if boxes[0][0] + boxes[1][1] + boxes[2][2] == -3 or boxes[2][0] + boxes[1][1] + boxes[0][2] == -3:
        winner = 2
        game_over = True


def draw_winner(winner):
    win_text = "Hurray!! Player " + str(winner) + " wins!!"
    win_img = font.render(win_text, True, blue)
    pygame.draw.rect(screen, green, (screenwidth//2-100, screenheight//2-60, 200, 50))
    screen.blit(win_img, (screenwidth//2-100, screenheight//2-50))

    again_text = "Wanna play again?"
    again_img = font.render(again_text, True, blue)
    pygame.draw.rect(screen, green, again_rect)
    screen.blit(again_img, (screenwidth//2-80, screenheight//2+10))

run = True
while run:
    draw_grid()
    draw_boxes()
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            run = False
        if game_over == 0:
            if event.type == pygame.MOUSEBUTTONDOWN and clicked == False:
                clicked = True
            if event.type == pygame.MOUSEBUTTONUP and clicked == True:
                clicked = False
                pos = pygame.mouse.get_pos()
                cellx = pos[0]
                celly = pos[1]
                if boxes[cellx // 100][celly // 100] == 0:
                    boxes[cellx // 100][celly // 100] = player
                    player *= -1
                    check_win()


    if game_over == True:
        draw_winner(winner)

    pygame.display.update()

pygame.quit()
