##
## makefile for  in
##
## Made by BELKADI Ayoub
## Login   <belkad_a@etna-alternance.net>
##
## Started on  Mon Mar 27 10:20:18 2017 BELKADI Ayoub
## Last update Sun Nov  4 12:52:44 2018 Belkadi
##
CXX = g++ -std=c++11 # compilateur
CFLAGS = #options de compilation
LDFLAGS = -lsfml-graphics -lsfml-window -lsfml-system -ljsoncpp

SRC = $(wildcard src/*.cpp) $(wildcard snakeLittle/*.cpp) $(wildcard snakeLittle/*.h) $(wildcard snakeLittle/engine/*.cpp) $(wildcard snakeLittle/engine/factory/*.cpp) $(wildcard snakeLittle/entity/*.cpp)
OBJ = $(SRC:.cpp=.o)

OUTPUT =snake# nom du programme

all:	$(OBJ)
	$(CXX) -o $(OUTPUT) $(LDFLAGS) $^

$(OBJ):	%.o: %.cpp
	$(CXX) $(CFLAGS) -c $< -o $@


.PHONY:	clean mrproper

clean:
	rm -rf *.o

mrproper:	clean
		rm -rf $(OUTPUT)
