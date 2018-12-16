/*
 * GameView.h
 *
 *  Created on: 4 nov. 2018
 *      Author: ayoub
 */

#include <SFML/Graphics.hpp>
#include <vector>
#include <iostream>
#include <sstream>
#include <string>
#include <fstream>
#include <jsoncpp/json/json.h>
#include <unistd.h>
#ifndef GAMEVIEW_H_
#define GAMEVIEW_H_

namespace Elements {
class Health;
class Speed;
class Slow;
class Malus;
class Wall;
class Invincible;
class SnakeRings;
class Menu;
};
namespace GameView {
class GameView;
};
namespace Engine {
	class Map {
		public:
			Map(int level);
			int level;
			int drops_left;
			std::vector<Json::Value> levelUpDrops;
			void generate(GameView::GameView *gameView);
			void make_walls_TB(int tb,GameView::GameView *gameView);
			void make_walls_LR(int tb,GameView::GameView *gameView);
			void draw(GameView::GameView *gameView);
		};
	class Base {
		public:
			Base();
			virtual void draw() = 0; 
			virtual void update() = 0; 
	};
	class Entity {
		public:
			Entity();
			virtual void setPositionCustum(int i) = 0;
			virtual void draw() = 0; 
			virtual void update() = 0; 
	};
	class DROP_FACTORY {
		public:
    		static Entity* make_entity(int type, GameView::GameView *gameView);
    };
	class Singleton {
	    private:
	        static std::vector<Json::Value> instance;
	        Singleton();
	    public:
	        static std::vector<Json::Value> getInstance(int level, GameView::GameView *gameView);
	};
};
namespace GameView {

class GameView {
public:
	GameView();
	sf::RenderWindow *window;
	Engine::Map *map;
	Elements::SnakeRings *snakeRings;
	Elements::Menu *menu;
	virtual ~GameView();
	  sf::Clock clock;
	  sf::Time remainingTime;
	void run();
	void is_win();
	void restart(int nextLvl);
	void render();
};

}; /* namespace GameView */
namespace Elements {
	class Health: public Engine::Base,public Engine::Entity {
		public:
		Health(GameView::GameView *gameView);
		GameView::GameView *gameView;
		sf::RectangleShape *shape;
		int i;
		void update();
		void draw();
		void setPositionCustum(int i);
	};
	class Speed: public Engine::Base,public Engine::Entity {
		public:
		Speed(GameView::GameView *gameView);
		GameView::GameView *gameView;
		sf::RectangleShape *shape;
		int i;
		void update();
		void draw();
		void setPositionCustum(int i);
	};
	class Slow: public Engine::Base,public Engine::Entity {
		public:
		Slow(GameView::GameView *gameView);
		GameView::GameView *gameView;
		sf::RectangleShape *shape;
		int i;
		void update();
		void draw();
		void setPositionCustum(int i);
	};
	class Malus: public Engine::Base,public Engine::Entity {
		public:
		Malus(GameView::GameView *gameView);
		GameView::GameView *gameView;
		sf::RectangleShape *shape;
		int i;
		void update();
		void draw();
		void setPositionCustum(int i);
	};
	class Wall: public Engine::Base,public Engine::Entity {
		public:
		Wall(GameView::GameView *gameView);
		GameView::GameView *gameView;
		sf::RectangleShape *shape;
		int i;
		void update();
		void draw();
		void setPositionCustum(int i);
	};
	class Invincible: public Engine::Base,public Engine::Entity {
		public:
		Invincible(GameView::GameView *gameView);
		GameView::GameView *gameView;
		sf::RectangleShape *shape;
		int i;
		void update();
		void draw();
		void setPositionCustum(int i);
	};
	class Menu: public Engine::Base {
		public:
		Menu(GameView::GameView *gameView);
		GameView::GameView *gameView;
		void update();
		void draw();
		void MoveUp();
		void MoveDown();
		int GetPressedItem() { return selectedItemIndex; }
		private:
			int selectedItemIndex;
			sf::Font font;
			sf::Text menu[3];
	};
	class SnakeRings: public Engine::Base {
		public:
		SnakeRings(GameView::GameView *gameView);
		GameView::GameView *gameView;
		std::size_t length;
		std::size_t head;
		sf::CircleShape body;
		std::size_t maxLength;
		std::vector<sf::Vector2f> position;
		sf::Vector2f velocity;
		int velocity_time;
		bool speed_up;
		bool slow_down;
		bool invincible;
		void set_velocity();
		void update();
		void draw();
	};
};
#endif /* GAMEVIEW_H_ */
