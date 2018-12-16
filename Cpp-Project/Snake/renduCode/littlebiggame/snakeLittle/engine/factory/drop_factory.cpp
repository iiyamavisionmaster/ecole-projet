#include "../../GameView.h"

Engine::Entity  *Engine::DROP_FACTORY::make_entity(int type, GameView::GameView *gameView)
{
  if (type == 0)
    return new Elements::Health(gameView);
  else if (type == 1)
    return new Elements::Speed(gameView);
  else if (type == 2)
    return new Elements::Wall(gameView);
  else if (type == 3)
    return new Elements::Slow(gameView);
  else if (type == 4)
    return new Elements::Malus(gameView);
  else if (type == 5)
    return new Elements::Invincible(gameView);
}