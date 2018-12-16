   			package views;

import com.cours.dao.IGroupsDao;
import com.cours.dao.factory.AbstractDaoFactory;
import com.cours.dao.factory.FactoryType;
import com.cours.entities.Groups;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.geometry.Insets;
import javafx.geometry.Orientation;
import javafx.geometry.Pos;
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

public class GroupsV {
	IGroupsDao GroupsDaoSql = (IGroupsDao) AbstractDaoFactory.getDaoFactory(FactoryType.SQL_DAO).getGroupsDao();
	  
	  private ObservableList<Groups> getGroupsList() {
		  
		  Groups user1 = new Groups(1,"GroupeTemp", "commentaire","1,2");
	 
	      ObservableList<Groups> list = FXCollections.observableArrayList(GroupsDaoSql.findAll());
	      return list;
	      }
	   public Scene getDashboardScene(Stage stage) {

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
		      
		      TableView<Groups> table = new TableView<Groups>();
		      TableColumn<Groups, String> nameCol  = new TableColumn<Groups, String>("name");
		      TableColumn<Groups, String> comsCol = new TableColumn<Groups, String>("coms");
		      TableColumn<Groups, String> personneIdCol = new TableColumn<Groups, String>("personneId");
		      TableColumn<Groups, Void> colBtn = new TableColumn("Action");
		      
		        Callback<TableColumn<Groups, Void>, TableCell<Groups, Void>> cellFactory = new Callback<TableColumn<Groups, Void>, TableCell<Groups, Void>>() {
		            @Override
		            public TableCell<Groups, Void> call(final TableColumn<Groups, Void> param) {
		                final TableCell<Groups, Void> cell = new TableCell<Groups, Void>() {

		                    private final Button btn = new Button("Editer");

		                    {
		                        btn.setOnAction((ActionEvent event) -> {
		                        	Groups data = getTableView().getItems().get(getIndex());
		                            System.out.println("selectedData: " + data);
		                            stage.setScene(FormGroupssUpdate(stage,getIndex()));
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
		      personneIdCol.setCellValueFactory(new PropertyValueFactory<>("personneId"));
		    
		      //nameCol.setSortType(TableColumn.SortType.DESCENDING);
		 
		      ObservableList<Groups> list = getGroupsList();
		      table.setItems(list);
		 
		      table.getColumns().addAll(nameCol,comsCol,personneIdCol,colBtn);

		      Button Create = new Button("Create"); 
		      Create.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");

		      Create.setOnAction(new EventHandler<ActionEvent>() {
		    	    @Override public void handle(ActionEvent e) {
		    	    	stage.setScene(FormGroupssCreate(stage));
		    	    }
		    	});
		      GridPane gridPane = new GridPane();  
		      gridPane.setAlignment(Pos.TOP_LEFT);  
		      gridPane.add(table, 0, 0);
		      gridPane.add(Create, 0, 15);
		      leftPane.getChildren().add(gridPane);
		      BorderPane borderPaneSplitted = new BorderPane(splitPane);
		      root.getChildren().addAll(borderPaneSplitted,menuBar.getMenu(stage));

		      stage.setTitle("JAVA Fx Groupss ETNA Ayoub");

		      Scene scene = new Scene(root); 
	    return scene;
	   }
  	   protected Scene FormGroupssUpdate(Stage stage,int id) {
	  Groups p = GroupsDaoSql.findById(id + 1);
	  Text nameText = new Text("name");
	  Text comsText = new Text("coms"); 
	  Text personneIdText = new Text("personneId");  
	  TextField nameField = new TextField();       
	  TextField comsField = new TextField();    
	  TextField personneIdField = new TextField();     
	  
	  nameField.setText(p.getName());
	  comsField.setText(p.getComs());
	  personneIdField.setText((String) p.getPersonneId());
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
	  gridPane.add(personneIdText, 0, 2); 
	  gridPane.add(personneIdField, 1, 2); 
  gridPane.add(Save, 0, 7); 
  gridPane.add(Return, 2, 7);
  gridPane.add(Delete, 1, 7); 
  Save.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
  Return.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
  Delete.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
  Save.setOnAction(new EventHandler<ActionEvent>() {
	    @Override public void handle(ActionEvent e) {
  	    	GroupsDaoSql.update(new Groups(id ,nameField.getText(), comsField.getText(), personneIdField.getText()));	    }
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
  	    	GroupsDaoSql.delete(new Groups(id ,nameField.getText(), comsField.getText(), personneIdField.getText()));
    	    
        	stage.setScene(getDashboardScene(stage));
}
    });
  nameText.setStyle("-fx-font: normal bold 20px 'serif' "); 
  comsText.setStyle("-fx-font: normal bold 20px 'serif' ");	      
  personneIdText.setStyle("-fx-font: normal bold 20px 'serif' "); 
  gridPane.setStyle("-fx-background-color: #3e7cad;"); 
  

  MenuGlobal menuBar = new MenuGlobal();
  Pane root = new Pane();
  
  root.getChildren().addAll(gridPane,menuBar.getMenu(stage));
  
  
  Scene scene = new Scene(root); 
  stage.setTitle("JAVA Fx Groupss ETNA Ayoub"); 
return scene;
}
	   protected Scene FormGroupssCreate(Stage stage) {
		      Text nameText = new Text("Nom");
		      Text comsText = new Text("Messages"); 
		      Text personneIdText = new Text("personneId"); 
		      TextField nameField = new TextField();       
		      TextField comsField = new TextField();    
		      TextField personneIdField = new TextField();
		      
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
		      gridPane.add(personneIdText, 0, 2);
		      gridPane.add(personneIdField, 1, 2);
		      gridPane.add(Save, 0, 7);
		      gridPane.add(Return, 2, 7);
		      Save.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
		      Return.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
		      Save.setOnAction(new EventHandler<ActionEvent>() {
		    	    @Override public void handle(ActionEvent e) {
		    	    	GroupsDaoSql.create(new Groups(0 ,nameField.getText(), comsField.getText(), personneIdField.getText()));
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
		      personneIdText.setStyle("-fx-font: normal bold 20px 'serif' ");  
		      gridPane.setStyle("-fx-background-color: #3e7cad;"); 

		      MenuGlobal menuBar = new MenuGlobal();
		      Pane root = new Pane();
		      
		      root.getChildren().addAll(gridPane,menuBar.getMenu(stage));
		      
		      Scene scene = new Scene(root); 
		      stage.setTitle("JAVA Fx Groupss ETNA Ayoub"); 
	    return scene;
	   }	   
  	   
  	   
}