#include "../GameView.h"
Elements::SnakeRings::SnakeRings(GameView::GameView *gameView) {
    this->gameView = gameView;
    this->length = 1; 
    this->head = 0;   
    this->maxLength = 10;
    this->velocity_time = 200;
    this->body.setRadius(8);
    this->position.reserve(this->maxLength);
    this->position[this->head] = sf::Vector2f(256, 256);
    this->velocity = sf::Vector2f(0, 0);
    this->speed_up = false;
    this->slow_down = false;
    this->invincible = false;
}

void Elements::SnakeRings::update() {
    this->gameView->remainingTime += this->gameView->clock.restart();
       std::ostringstream ss;
       ss << 1.0f/this->gameView->remainingTime.asSeconds();
       this->gameView->window->setTitle(ss.str());
    while (this->gameView->remainingTime > sf::milliseconds(this->velocity_time)) {
    this->set_velocity();
        sf::Vector2f newPos = this->position[this->head] + this->velocity;
        this->head = ++this->head % this->maxLength;
        this->position[this->head] = newPos;
        this->gameView->remainingTime -= sf::milliseconds(this->velocity_time);
    }
  }
void Elements::SnakeRings::draw() {
    for (std::size_t i = 0; i < this->length; ++i) {
        this->body.setPosition(this->position[(this->head + this->maxLength - i) % this->maxLength]);

        this->gameView->window->draw(this->body);
    }
  }


void Elements::SnakeRings::set_velocity() {
    int tempVelocity = 0;
    if (this->speed_up == true)
        tempVelocity = 18;
    else if (this->slow_down == true)
        tempVelocity = 16;
    if (this->speed_up || this->slow_down)
    {
        if (this->velocity.x > 0)
        {
            this->velocity = sf::Vector2f(tempVelocity, 0);
        } else if(this->velocity.x < 0) {
            this->velocity = sf::Vector2f(-tempVelocity, 0);
        }
        if (this->velocity.y > 0)
        {
            this->velocity = sf::Vector2f(0, tempVelocity);
        } else if(this->velocity.y < 0) {
            this->velocity = sf::Vector2f(0, -tempVelocity);
        }
    }

}