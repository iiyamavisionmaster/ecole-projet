#include "../GameView.h"


Elements::Menu::Menu(GameView::GameView *gameView)
{
	this->gameView = gameView;
	int width = gameView->window->getSize().x;
	int height = gameView->window->getSize().y;
	if (!font.loadFromFile("./ressources/fonts/arial.ttf"))
	{
	}

	menu[0].setFont(font);
	menu[0].setColor(sf::Color::Red);
	menu[0].setString("Play");
	menu[0].setPosition(sf::Vector2f(width / 2, height / (3 + 1) * 1));

	menu[1].setFont(font);
	menu[1].setColor(sf::Color::White);
	menu[1].setString("Credit");
	menu[1].setPosition(sf::Vector2f(width / 2, height / (3 + 1) * 2));

	menu[2].setFont(font);
	menu[2].setColor(sf::Color::White);
	menu[2].setString("Exit");
	menu[2].setPosition(sf::Vector2f(width / 2, height / (3 + 1) * 3));

	selectedItemIndex = 0;
}


void Elements::Menu::draw()
{
	for (int i = 0; i < 3; i++)
	{
		this->gameView->window->draw(menu[i]);
	}
}
void Elements::Menu::update()
{
}

void Elements::Menu::MoveUp()
{
	if (selectedItemIndex - 1 >= 0)
	{
		menu[selectedItemIndex].setColor(sf::Color::White);
		selectedItemIndex--;
		menu[selectedItemIndex].setColor(sf::Color::Red);
	}
}

void Elements::Menu::MoveDown()
{
	if (selectedItemIndex + 1 < 3)
	{
		menu[selectedItemIndex].setColor(sf::Color::White);
		selectedItemIndex++;
		menu[selectedItemIndex].setColor(sf::Color::Red);
	}
}