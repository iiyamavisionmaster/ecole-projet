#include "GameView.h"
namespace GameView {
GameView::GameView() {
    this->window = new sf::RenderWindow(sf::VideoMode(600, 512), "Snake Test", sf::Style::Close | sf::Style::Titlebar);
    this->window->setFramerateLimit(60);
    this->map = new Engine::Map(0);
    this->snakeRings = new Elements::SnakeRings(this);
    this->map->level = 1;
    this->map->generate(this);
    this->map->level = 0;
            this->menu = new Elements::Menu(this);
    this->run();
}


GameView::~GameView() {
    // TODO Auto-generated destructor stub
}

void GameView::restart(int nextLvl) {
    this->map = new Engine::Map(0);
    this->snakeRings = new Elements::SnakeRings(this);
    this->map->level = 1;
    this->map->generate(this);
    this->map->level = nextLvl;
    this->menu = new Elements::Menu(this);
    this->run();
}

void GameView::render() {
    if (this->map->level != 0){
        this->snakeRings->update();
        this->window->clear();
        this->snakeRings->draw();
        this->map->draw(this);
        this->is_win();
    }
    else if (this->map->level == 0){
        this->window->clear();
        this->menu->draw();
    }
    }

void GameView::run() {
    while (this->window->isOpen()) {
        sf::Event event;
        while (this->window->pollEvent(event)) {
            switch (event.type) {
                case sf::Event::Closed:
                this->window->close();
                break;
                  case sf::Event::KeyPressed:
                switch (event.key.code) {
                    case sf::Keyboard::Up:
                        if (this->map->level == 0)
                            this->menu->MoveUp();
                        else
                            this->snakeRings->velocity = sf::Vector2f(0, -16);
                        break;
                    case sf::Keyboard::Down:
                        if (this->map->level == 0)
                            this->menu->MoveDown();
                        else
                            this->snakeRings->velocity = sf::Vector2f(0, 16);
                        break;
                    case sf::Keyboard::Left:
                        this->snakeRings->velocity = sf::Vector2f(-16, 0);
                        break;
                    case sf::Keyboard::Right:
                        this->snakeRings->velocity = sf::Vector2f(16, 0);
                        break;
                    case sf::Keyboard::Return:
                        switch (this->menu->GetPressedItem()) {
                            case 0:
                                if (this->map->level == 0)
                                    this->map->level += 1;
                                break;
                            case 1:
                                std::cout << "Credit" << std::endl;
                                break;
                            case 2:
                                this->window->close();
                                break;
                        }
                        break;
                }
            }
        }
        this->render();
        this->window->display();
  }
}
void GameView::is_win() {
    this->map->drops_left = 0;

    for (int i = 0; i < this->map->levelUpDrops[this->map->level-1].size(); ++i) {
        if (this->map->levelUpDrops[this->map->level-1][i]["0"].asInt() != 0 && this->map->levelUpDrops[this->map->level-1][i]["1"].asInt() != 0 && this->map->levelUpDrops[this->map->level-1][i]["2"].asInt()==0)
        {
            this->map->drops_left++;
        }
    }
            sf::Font font;
    int width = this->window->getSize().x;
    int height = this->window->getSize().y;
    if (!font.loadFromFile("./ressources/fonts/arial.ttf"))
    {
    }
    sf::Text drops_left_str;
    std::stringstream ss;
    ss << "objet restant : " << this->map->drops_left;
    std::string s = ss.str(); 
    drops_left_str.setFont(font);
    drops_left_str.setColor(sf::Color::Red);
    drops_left_str.setString(s);
    drops_left_str.setPosition(sf::Vector2f(width / 2, 10));
    this->window->draw(drops_left_str);

    sf::Text level_str;
    std::stringstream ss2;
    ss2 << "Level : " << this->map->level;
    s = ss2.str(); 
    drops_left_str.setFont(font);
    drops_left_str.setColor(sf::Color::Red);
    drops_left_str.setString(s);
    drops_left_str.setPosition(sf::Vector2f(10, 10));
    this->window->draw(drops_left_str);
    if (this->map->drops_left == 0)
    {
        sf::Text win_str;
        win_str.setFont(font);
        win_str.setColor(sf::Color::White);
        win_str.setString("Victoire");
        win_str.setPosition(sf::Vector2f(width / 2, height / 2));
    this->window->draw(win_str);
        usleep(1000);
        this->map->level += 1 ;
        if (this->map->level > 3)
        {
        this->restart(0);
        }
        this->restart(this->map->level);
    }
}
} /* namespace GameView */