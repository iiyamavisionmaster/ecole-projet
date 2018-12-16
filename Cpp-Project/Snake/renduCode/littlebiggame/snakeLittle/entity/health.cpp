#include "../GameView.h"
Elements::Health::Health(GameView::GameView *gameView) {
  this->gameView = gameView;
  this->shape = new sf::RectangleShape(sf::Vector2f(10, 10));
  this->shape->setFillColor(sf::Color::Yellow);
}

  void Elements::Health::draw() {
    this->gameView->window->draw(*this->shape);
  }
  void Elements::Health::update() {
      bool intersect = this->gameView->snakeRings->body.getGlobalBounds().intersects(this->shape->getGlobalBounds());
      if (intersect)
      {
        this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["0"] = 0;
        this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["1"] = 0;
        ++this->gameView->snakeRings->length;
      }
  }
  void Elements::Health::setPositionCustum(int i) {
    this->i = i;
    this->shape->setPosition(this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["0"].asInt(),this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["1"].asInt());

  }

