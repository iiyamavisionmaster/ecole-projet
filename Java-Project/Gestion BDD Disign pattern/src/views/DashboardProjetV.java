    			package views;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.nio.file.Path;
import java.nio.file.WatchKey;
import java.nio.file.WatchService;

import com.cours.dao.IProjetDao;
import com.cours.dao.factory.AbstractDaoFactory;
import com.cours.dao.factory.FactoryType;
import com.cours.entities.Projet;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.geometry.Insets;
import javafx.geometry.Orientation;
import javafx.geometry.Pos;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.ChoiceBox;
import javafx.scene.control.Label;
import javafx.scene.control.SplitPane;
import javafx.scene.control.TableCell;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.TitledPane;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.Border;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.BorderStroke;
import javafx.scene.layout.BorderStrokeStyle;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.Pane;
import javafx.scene.layout.StackPane;
import javafx.scene.paint.Color;
import javafx.scene.text.Text;
import javafx.stage.Stage;
import javafx.util.Callback;
import java.io.IOException;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.nio.file.StandardWatchEventKinds;
import java.nio.file.WatchEvent;
import java.nio.file.WatchEvent.Kind;
import java.nio.file.WatchKey;
import java.nio.file.WatchService;
import java.util.LinkedList;
import java.util.List;
import java.util.UUID;
import java.util.concurrent.Executors;
import java.util.concurrent.TimeUnit;

import javafx.scene.control.TextArea;
public class DashboardProjetV {
	IProjetDao ProjetDaoSql = (IProjetDao) AbstractDaoFactory.getDaoFactory(FactoryType.SQL_DAO).getProjetDao();
	private TextArea textArea;
	  
	  private ObservableList<Projet> getProjetList() {
		  
		  Projet user1 = new Projet(1,"Jacob", "commentaire","groupe1,groupe2","tache1,tache2");
	 
	      ObservableList<Projet> list = FXCollections.observableArrayList(ProjetDaoSql.findAll());
	      return list;
	      }
	   public Scene getDashboardScene(Stage stage) {
		   BufferedReader br;
		try {
			   int j=0;
			br = new BufferedReader(new FileReader(new File(System.getProperty("user.dir") + "\\log\\logProjets.txt")));
			while (br.readLine() != null) j++;
			br.close();
			   List<String> lines = new LinkedList<String>();
			   br = new BufferedReader(new FileReader(new File(System.getProperty("user.dir") + "\\log\\logProjets.txt")));
				
			   int i=0;
					for(String tmp; (tmp = br.readLine()) != null;i++) 
			       if (lines.add(tmp) &&  i < j-2) 
			           lines.remove(0);
					br.close();
System.out.print(lines.toString());
TextArea textArea;
textArea = new TextArea(lines.toString() + "\n");
textArea.setPrefRowCount(10);
textArea.setPrefColumnCount(100);
textArea.setWrapText(true);
textArea.setPrefWidth(150);







StackPane leftPane = new StackPane(new Label(""));
StackPane rightPane = new StackPane(new Label(""));
SplitPane splitPane = new SplitPane();
splitPane.getItems().addAll(leftPane, rightPane);
splitPane.setDividerPositions(0.75);

leftPane.setPadding(new Insets(26,0,0,0));
rightPane.setPadding(new Insets(26,0,0,0));
splitPane.setPrefSize(500,700);
//Constrain max size of left component:
leftPane.maxWidthProperty().bind(splitPane.widthProperty().multiply(0.75));

  MenuGlobal menuBar = new MenuGlobal();
  Pane root = new Pane();
  
  TableView<Projet> table = new TableView<Projet>();
  TableColumn<Projet, String> nameCol  = new TableColumn<Projet, String>("name");
  TableColumn<Projet, String> comsCol = new TableColumn<Projet, String>("coms");
  TableColumn<Projet, String> groupCol = new TableColumn<Projet, String>("groupId");
  TableColumn<Projet, String> tacheCol = new TableColumn<Projet, String>("tacheId");
  TableColumn<Projet, Void> colBtn = new TableColumn("Action");
  
    Callback<TableColumn<Projet, Void>, TableCell<Projet, Void>> cellFactory = new Callback<TableColumn<Projet, Void>, TableCell<Projet, Void>>() {
        @Override
        public TableCell<Projet, Void> call(final TableColumn<Projet, Void> param) {
            final TableCell<Projet, Void> cell = new TableCell<Projet, Void>() {

                private final Button btn = new Button("Editer");

                {
                    btn.setOnAction((ActionEvent event) -> {
                    	Projet data = getTableView().getItems().get(getIndex());
                        System.out.println("selectedData: " + data);
                        stage.setScene(FormProjetsUpdate(stage,getIndex()));
                    });
                }

                @Override
                public void updateItem(Void item, boolean empty) {
                    super.updateItem(item, empty);
                    if (empty) {
                        setGraphic(null);
                    } else {
                        setGraphic(btn);
                    }
                }
            };
            return cell;
        }
    };
    colBtn.setCellFactory(cellFactory);
  nameCol.setCellValueFactory(new PropertyValueFactory<>("name"));
  comsCol.setCellValueFactory(new PropertyValueFactory<>("coms"));
  groupCol.setCellValueFactory(new PropertyValueFactory<>("groupId"));
  tacheCol.setCellValueFactory(new PropertyValueFactory<>("tacheId"));

  //nameCol.setSortType(TableColumn.SortType.DESCENDING);

  ObservableList<Projet> list = getProjetList();
  table.setItems(list);

  table.getColumns().addAll(nameCol,comsCol,groupCol,tacheCol,colBtn);

  Button Create = new Button("Create"); 
  Create.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");

  Create.setOnAction(new EventHandler<ActionEvent>() {
	    @Override public void handle(ActionEvent e) {
	    	stage.setScene(FormProjetsCreate(stage));
	    }
	});
  GridPane gridPane = new GridPane();  
  gridPane.setAlignment(Pos.TOP_LEFT);  
  gridPane.add(table, 0, 0);
  gridPane.add(Create, 0, 15);
  GridPane gridPane2 = new GridPane();  
  gridPane2.setAlignment(Pos.TOP_LEFT);  
  gridPane2.add(textArea,0,0);
  leftPane.getChildren().add(gridPane);
  rightPane.getChildren().add(gridPane2);
  BorderPane borderPaneSplitted = new BorderPane(splitPane);
  root.getChildren().addAll(borderPaneSplitted,menuBar.getMenu(stage));

  stage.setTitle("JAVA Fx Projets ETNA Ayoub");

  Scene scene = new Scene(root); 
  return scene;
		} catch (FileNotFoundException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		} catch (IOException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
		return null;
           
	   }
  	   protected Scene FormProjetsUpdate(Stage stage,int id) {
	  Projet p = ProjetDaoSql.findById(id + 1);
	  Text nameText = new Text("name");
	  Text comsText = new Text("coms"); 
	  Text groupIdText = new Text("groupId");
	  Text tacheIdText = new Text("tacheId");    
	  TextField nameField = new TextField();       
	  TextField comsField = new TextField();    
	  TextField groupIdField = new TextField();    
	  TextField tacheIdField = new TextField();    
	  
	  nameField.setText(p.getName());
	  comsField.setText(p.getComs());
	  groupIdField.setText(p.getGroupId());
	  tacheIdField.setText(p.gettacheId());
	  Button Save = new Button("Save"); 
	  Button Return = new Button("Retour"); 
	  Button Delete = new Button("Delete"); 
	  GridPane gridPane = new GridPane();       
	  gridPane.setMinSize(600, 500); 
	  gridPane.setVgap(10); 
	  gridPane.setHgap(10);       
	  gridPane.setAlignment(Pos.CENTER); 
	  gridPane.add(nameText, 0, 0); 
	  gridPane.add(nameField, 1, 0); 
	  gridPane.add(comsText, 0, 1);       
	  gridPane.add(comsField, 1, 1); 
	  gridPane.add(groupIdText, 0, 2); 
	  gridPane.add(groupIdField, 1, 2); 
	  gridPane.add(tacheIdText, 0, 3);       
	  gridPane.add(tacheIdField, 1, 3); 
  gridPane.add(Save, 0, 7); 
  gridPane.add(Return, 2, 7);
  gridPane.add(Delete, 1, 7); 
  Save.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
  Return.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
  Delete.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
  Save.setOnAction(new EventHandler<ActionEvent>() {
	    @Override public void handle(ActionEvent e) {
  	    	ProjetDaoSql.update(new Projet(id ,nameField.getText(), comsField.getText(), groupIdField.getText(),tacheIdField.getText()));	    }
	});
  Return.setOnAction(new EventHandler<ActionEvent>() {
        @Override
        public void handle(ActionEvent event) {
        	stage.setScene(getDashboardScene(stage));
}
    });
  Delete.setOnAction(new EventHandler<ActionEvent>() {
        @Override
        public void handle(ActionEvent event) {
  	    	ProjetDaoSql.delete(new Projet(id ,nameField.getText(), comsField.getText(), groupIdField.getText(),tacheIdField.getText()));
    	    
        	stage.setScene(getDashboardScene(stage));
}
    });
  nameText.setStyle("-fx-font: normal bold 20px 'serif' "); 
  comsText.setStyle("-fx-font: normal bold 20px 'serif' ");	      
  groupIdText.setStyle("-fx-font: normal bold 20px 'serif' "); 
  tacheIdText.setStyle("-fx-font: normal bold 20px 'serif' ");	
  gridPane.setStyle("-fx-background-color: #3e7cad;"); 
  

  MenuGlobal menuBar = new MenuGlobal();
  Pane root = new Pane();
  
  root.getChildren().addAll(gridPane,menuBar.getMenu(stage));
  
  
  Scene scene = new Scene(root); 
  stage.setTitle("JAVA Fx Projets ETNA Ayoub"); 
return scene;
}
	   protected Scene FormProjetsCreate(Stage stage) {
		      Text nameText = new Text("Nom");
		      Text comsText = new Text("Messages"); 
		      Text groupIdText = new Text("Groupe");
		      Text tacheIdText = new Text("Tache");  
		      TextField nameField = new TextField();       
		      TextField comsField = new TextField();    
		      TextField groupIdField = new TextField();    
		      TextField tacheIdField = new TextField();    
		      
		      Button Save = new Button("Save"); 
		      Button Return = new Button("Retour"); 
		      GridPane gridPane = new GridPane();    
		      gridPane.setMinSize(600, 500); 
		      gridPane.setVgap(10); 
		      gridPane.setHgap(10);       
		      gridPane.setAlignment(Pos.CENTER); 
		      gridPane.add(nameText, 0, 0);
		      gridPane.add(nameField, 1, 0);
		      gridPane.add(comsText, 0, 1);     
		      gridPane.add(comsField, 1, 1);
		      gridPane.add(groupIdText, 0, 2);
		      gridPane.add(groupIdField, 1, 2);
		      gridPane.add(tacheIdText, 0, 3);    
		      gridPane.add(tacheIdField, 1, 3);
		      gridPane.add(Save, 0, 7);
		      gridPane.add(Return, 2, 7);
		      Save.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
		      Return.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
		      Save.setOnAction(new EventHandler<ActionEvent>() {
		    	    @Override public void handle(ActionEvent e) {
		    	    	ProjetDaoSql.create(new Projet(0 ,nameField.getText(), comsField.getText(), groupIdField.getText(),tacheIdField.getText()));
		    	    }
		    	});
		      Return.setOnAction(new EventHandler<ActionEvent>() {
		            @Override
		            public void handle(ActionEvent event) {
		            	stage.setScene(getDashboardScene(stage));
		            }
		        });
		      nameText.setStyle("-fx-font: normal bold 20px 'serif' "); 
		      comsText.setStyle("-fx-font: normal bold 20px 'serif' ");	      
		      groupIdText.setStyle("-fx-font: normal bold 20px 'serif' "); 
		      tacheIdText.setStyle("-fx-font: normal bold 20px 'serif' ");	  
		      gridPane.setStyle("-fx-background-color: #3e7cad;"); 

		      MenuGlobal menuBar = new MenuGlobal();
		      Pane root = new Pane();
		      
		      root.getChildren().addAll(gridPane,menuBar.getMenu(stage));
		      
		      Scene scene = new Scene(root); 
		      stage.setTitle("JAVA Fx Projets ETNA Ayoub"); 
	    return scene;
	   }	   
  	   
  	   
}
