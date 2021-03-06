#include "../GameView.h"
Elements::Speed::Speed(GameView::GameView *gameView) {
  	this->gameView = gameView;
  	this->shape = new sf::RectangleShape(sf::Vector2f(10, 10));
	this->shape->setFillColor(sf::Color::Blue);
}

  void Elements::Speed::draw() {
    this->gameView->window->draw(*this->shape);
  }
  void Elements::Speed::update() {
      bool intersect = this->gameView->snakeRings->body.getGlobalBounds().intersects(this->shape->getGlobalBounds());
      if (intersect)
      {
        this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["0"] = 0;
        this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["1"] = 0;
        this->gameView->snakeRings->speed_up = true;
      }
  }
  void Elements::Speed::setPositionCustum(int i) {
    this->i = i;
    this->shape->setPosition(this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["0"].asInt(),this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["1"].asInt());
  }