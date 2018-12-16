#include "../GameView.h"

std::vector<Json::Value> Engine::Singleton::instance;
std::vector<Json::Value>  Engine::Singleton::getInstance(int level, GameView::GameView *gameView)
{
    if (instance.empty()!=0)
    {

    for (int i = 1; i < 4; ++i) {
        std::ostringstream path;
        path << "./ressources/"<< i <<".json";
        std::ifstream file(path.str());
        std::stringstream buffer;
    
        buffer << file.rdbuf();
        std::string str = buffer.str();
    
        std::string text =str;
        Json::Value root;
        Json::Reader reader;
        bool parsingSuccessful = reader.parse( str, root );
        if ( !parsingSuccessful )
        {
            std::cout << "Error parsing the string" << std::endl;
        }
        gameView->map->levelUpDrops.push_back( root["0"]);
        instance.push_back( root["0"]);
    }
    }
    gameView->map->levelUpDrops = instance;
    return instance;
}

Engine::Singleton::Singleton()
{
}