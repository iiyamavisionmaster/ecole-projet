#include "../GameView.h"
Elements::Wall::Wall(GameView::GameView *gameView) {
  this->gameView = gameView;

          this->shape = new sf::RectangleShape(sf::Vector2f(10, 10));
        this->shape->setFillColor(sf::Color(187, 68, 68));
}

  void Elements::Wall::draw() {
    this->gameView->window->draw(*this->shape);
  }
  void Elements::Wall::update() {
      bool intersect = this->gameView->snakeRings->body.getGlobalBounds().intersects(this->shape->getGlobalBounds());
      if (intersect && this->gameView->snakeRings->invincible == false)
      {
        this->gameView->restart(0);
      } else if (intersect && this->gameView->snakeRings->invincible == true) {
        this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["0"] = 0;
        this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["1"] = 0;
        this->gameView->snakeRings->invincible = false;
      }
  }
  void Elements::Wall::setPositionCustum(int i) {
    this->i = i;
    this->shape->setPosition(this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["0"].asInt(),this->gameView->map->levelUpDrops[this->gameView->map->level-1][this->i]["1"].asInt());

  }

