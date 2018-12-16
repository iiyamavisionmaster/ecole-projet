#include "../GameView.h"
Engine::Map::Map(int level) {
    this->drops_left = 0;
	this->level = level;
}
void Engine::Map::draw(GameView::GameView *gameView){

    for (int i = 0; i < this->levelUpDrops[this->level-1].size(); ++i) {

        if (this->levelUpDrops[this->level-1][i]["0"].asInt() != 0 && this->levelUpDrops[this->level-1][i]["1"].asInt() != 0)
        {
			Engine::Entity *rectangle = DROP_FACTORY::make_entity(this->levelUpDrops[this->level-1][i]["2"].asInt(), gameView);
			rectangle->setPositionCustum(i);
			
			rectangle->update();
			rectangle->draw();
        }
    }
}
void Engine::Map::generate(GameView::GameView *gameView){
    gameView->map->levelUpDrops = Engine::Singleton::getInstance(this->level, gameView);
    this->make_walls_TB(55,gameView);
    this->make_walls_TB(500,gameView);
    this->make_walls_LR(10,gameView);
    this->make_walls_LR(585,gameView);
    int levelUpDropsTemp[11][3] = {{170,210,0},{180,160,1},{80,60,2},{10,20,3},{130,420,4},{230,420,5},{210,320,0},{100,410,0},{380,140,0},{100,250,0},{100,200,1}};

}




void Engine::Map::make_walls_TB(int tb,GameView::GameView *gameView){
    for (int i = 0; i < 54; ++i)
    {

    sf::Text drops_left_str;
    std::stringstream ss;
    ss << "{\"0\":" << i*11<<",\"1\":"<< tb <<",\"2\":2}";
	    std::string strJson = ss.str(); 

	    Json::Value root;   
	    Json::Reader reader;
	    bool parsingSuccessful = reader.parse( strJson.c_str(), root );
	    if ( !parsingSuccessful )
	    {
	        std::cout  << "Failed to parse"
	               << reader.getFormattedErrorMessages();
	    }
    for (int i = 0; i < this->levelUpDrops.size(); ++i) 
    	gameView->map->levelUpDrops[i].append(root);
    }
}
void Engine::Map::make_walls_LR(int tb,GameView::GameView *gameView){
    for (int i = 5; i < 49; ++i)
    {

    sf::Text drops_left_str;
    std::stringstream ss;
    ss << "{\"0\":" << tb <<",\"1\":"<< i*11 <<",\"2\":2}";
	    std::string strJson = ss.str(); 

	    Json::Value root;   
	    Json::Reader reader;
	    bool parsingSuccessful = reader.parse( strJson.c_str(), root );
	    if ( !parsingSuccessful )
	    {
	        std::cout  << "Failed to parse"
	               << reader.getFormattedErrorMessages();
	    }
    for (int i = 0; i < this->levelUpDrops.size(); ++i) 
    	gameView->map->levelUpDrops[i].append(root);
    }
}