#include "../GameView.h"
Elements::Slow::Slow(GameView::GameView *gameView) {
  	this->gameView = gameView;
  	this->shape = new sf::RectangleShape(sf::Vector2f(10, 10));
	this->shape->setFillColor(sf::Color(200, 203, 202));
}

  void Elements::Slow::draw() {
    this->gameView->window->draw(*this->shape);
  }
  void Elements::Slow::update() {
      bool intersect = this->gameView->snakeRings->body.getGlobalBounds().intersects(this->shape->getGlobalBounds());
      if (intersect)
      {
        this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["0"] = 0;
        this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["1"] = 0;
        this->gameView->snakeRings->slow_down = true;
      }
  }
  void Elements::Slow::setPositionCustum(int i) {
    this->i = i;
    this->shape->setPosition(this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["0"].asInt(),this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["1"].asInt());
  }