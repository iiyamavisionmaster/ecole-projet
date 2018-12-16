#include "../GameView.h"
Elements::Malus::Malus(GameView::GameView *gameView) {
  this->gameView = gameView;
  this->shape = new sf::RectangleShape(sf::Vector2f(10, 10));
  this->shape->setFillColor(sf::Color::Red);
}

void Elements::Malus::draw() {
  this->gameView->window->draw(*this->shape);
}
void Elements::Malus::update() {
    bool intersect = this->gameView->snakeRings->body.getGlobalBounds().intersects(this->shape->getGlobalBounds());
    if (intersect)
    {
      this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["0"] = 0;
      this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["1"] = 0;
      if (this->gameView->snakeRings->length > 1)
      {
        --this->gameView->snakeRings->length;
      } else {
        this->gameView->restart(0);
      }
    }
}
void Elements::Malus::setPositionCustum(int i) {
  this->i = i;
  this->shape->setPosition(this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["0"].asInt(),this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["1"].asInt());

}

