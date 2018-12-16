package views;

import com.cours.dao.IPersonneDao;
import com.cours.dao.factory.AbstractDaoFactory;
import com.cours.dao.factory.FactoryType;
import com.cours.entities.Personne;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TableCell;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.Pane;
import javafx.scene.layout.StackPane;
import javafx.scene.text.Text;
import javafx.stage.Stage;
import javafx.stage.Window;
import javafx.util.Callback;

public class ContactsV {

	IPersonneDao personneDaoSql = (IPersonneDao) AbstractDaoFactory.getDaoFactory(FactoryType.SQL_DAO).getPersonneDao();
	  
	  private ObservableList<Personne> getPersonneList() {
		  
		  Personne user1 = new Personne(1,"Jacob", "Smith",20.0,25.3, "3 rue jules ferry","Courbevoie","92400");
	 
	      ObservableList<Personne> list = FXCollections.observableArrayList(personneDaoSql.findAll());
	      return list;
	      }
	   public Scene getLoginScene(Stage stage) {
	      Text text1 = new Text("Login");
	      Text text2 = new Text("Password");    
	      TextField textField1 = new TextField();       
	      PasswordField textField2 = new PasswordField();  
	      Button button1 = new Button("Connexion"); 
	      GridPane gridPane = new GridPane();  
	      gridPane.setPadding(new Insets(10, 10, 10, 10)); 
	      gridPane.setVgap(10); 
	      gridPane.setHgap(10);       
	      gridPane.setAlignment(Pos.TOP_LEFT); 
	      gridPane.add(text1, 10, 10); 
	      gridPane.add(textField1, 11, 10); 
	      gridPane.add(text2, 10, 11);       
	      gridPane.add(textField2, 11, 11); 
	      gridPane.add(button1, 10, 12); 
	      button1.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
	      button1.setOnAction(new EventHandler<ActionEvent>() {
	    	    @Override public void handle(ActionEvent e) {
	                if(textField1.getText().isEmpty()) {
	                    showAlert(Alert.AlertType.ERROR, gridPane.getScene().getWindow(), " Error!", "Login obligatoire");
	                    return;
	                }else if(textField2.getText().isEmpty()){
	                    showAlert(Alert.AlertType.ERROR, gridPane.getScene().getWindow(), " Error!", "Password obligatoire");
	                    return;
	                }else {
	    	    	 stage.setScene(new DashboardProjetV().getDashboardScene(stage));
	                }
	    	    }
	    	});
	      
	      text1.setStyle("-fx-font: normal bold 20px 'serif' "); 
	      text2.setStyle("-fx-font: normal bold 20px 'serif' ");  
	      gridPane.setStyle("-fx-background-color: #3e7cad;"); 
	      Scene scene = new Scene(gridPane); 

	      stage.setTitle("JAVA Fx Personnes ETNA Ayoub"); 
		   return scene;
	   }

	   private void showAlert(Alert.AlertType alertType, Window owner, String title, String message) {
	       Alert alert = new Alert(alertType);
	       alert.setTitle(title);
	       alert.setHeaderText(null);
	       alert.setContentText(message);
	       alert.initOwner(owner);
	       alert.show();
	   }
	   protected Scene ListePersonnes(Stage stage) {
		      TableView<Personne> table = new TableView<Personne>();
		      TableColumn<Personne, String> NomCol  = new TableColumn<Personne, String>("Nom");
		      TableColumn<Personne, String> PrenomCol = new TableColumn<Personne, String>("Prenom");
		      TableColumn<Personne, String> PoidsCol = new TableColumn<Personne, String>("Poids");
		      TableColumn<Personne, String> TailleCol = new TableColumn<Personne, String>("Taille");
		      TableColumn<Personne, String> AdresseCol = new TableColumn<Personne, String>("Adresse");
		      TableColumn<Personne, String> RueCol = new TableColumn<Personne, String>("Rue");
		      TableColumn<Personne, String> VilleCol = new TableColumn<Personne, String>("Ville");
		      TableColumn<Personne, String> CodePostalCol = new TableColumn<Personne, String>("CodePostal");
		      TableColumn<Personne, Void> colBtn = new TableColumn("Action");
		      
		        Callback<TableColumn<Personne, Void>, TableCell<Personne, Void>> cellFactory = new Callback<TableColumn<Personne, Void>, TableCell<Personne, Void>>() {
		            @Override
		            public TableCell<Personne, Void> call(final TableColumn<Personne, Void> param) {
		                final TableCell<Personne, Void> cell = new TableCell<Personne, Void>() {

		                    private final Button btn = new Button("Editer");

		                    {
		                        btn.setOnAction((ActionEvent event) -> {
		                        	Personne data = getTableView().getItems().get(getIndex());
		                            System.out.println("selectedData: " + data);
		                            stage.setScene(FormPersonnesUpdate(stage,getIndex()));
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
		      AdresseCol.getColumns().addAll(RueCol, VilleCol, CodePostalCol);
		      NomCol.setCellValueFactory(new PropertyValueFactory<>("Nom"));
		      PrenomCol.setCellValueFactory(new PropertyValueFactory<>("Prenom"));
		      PoidsCol.setCellValueFactory(new PropertyValueFactory<>("Poids"));
		      TailleCol.setCellValueFactory(new PropertyValueFactory<>("Taille"));
		      AdresseCol.setCellValueFactory(new PropertyValueFactory<>("Adresse"));
		      RueCol.setCellValueFactory(new PropertyValueFactory<>("Rue"));
		      VilleCol.setCellValueFactory(new PropertyValueFactory<>("Ville"));
		      CodePostalCol.setCellValueFactory(new PropertyValueFactory<>("CodePostal"));
		    
		      NomCol.setSortType(TableColumn.SortType.DESCENDING);
		 
		      ObservableList<Personne> list = getPersonneList();
		      table.setItems(list);
		 
		      table.getColumns().addAll(NomCol,PrenomCol,PoidsCol,TailleCol,AdresseCol,colBtn);

		      Pane root = new Pane();
		      root.setPadding(new Insets(5));

		      
		      Button Create = new Button("Create"); 
		      Create.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");

		      Create.setOnAction(new EventHandler<ActionEvent>() {
		    	    @Override public void handle(ActionEvent e) {
		    	    	stage.setScene(FormPersonnesCreate(stage));
		    	    }
		    	});
		      MenuGlobal menuBar = new MenuGlobal();
		      GridPane gridPane = new GridPane();  
		      gridPane.setAlignment(Pos.CENTER);  
		      gridPane.add(table, 0, 0);
		      gridPane.add(Create, 0, 15);
		      gridPane.setPadding(new Insets(26,0,0,0));
		         root.getChildren().addAll(gridPane,menuBar.getMenu(stage));

		      stage.setTitle("JAVA Fx Personnes ETNA Ayoub");
		 
		      Scene scene = new Scene(root);

		       return scene;
	   }
	   protected Scene FormPersonnesCreate(Stage stage) {
		      Text NomText = new Text("Nom");
		      Text PrenomText = new Text("Prenom"); 
		      Text PoidsText = new Text("Poids");
		      Text TailleText = new Text("Taille"); 
		      Text RueText = new Text("Rue");
		      Text VilleText = new Text("Ville"); 
		      Text CodePostalText = new Text("CodePostal");    
		      TextField NomField = new TextField();       
		      TextField PrenomField = new TextField();    
		      TextField PoidsField = new TextField();    
		      TextField TailleField = new TextField();    
		      TextField RueField = new TextField();    
		      TextField VilleField = new TextField();    
		      TextField CodePostalField = new TextField();
		      
		      Button Save = new Button("Save"); 
		      Button Return = new Button("Retour"); 
		      GridPane gridPane = new GridPane();    
		      gridPane.setMinSize(600, 500); 
		      gridPane.setVgap(10); 
		      gridPane.setHgap(10);       
		      gridPane.setAlignment(Pos.CENTER); 
		      gridPane.add(NomText, 0, 0);
		      gridPane.add(NomField, 1, 0);
		      gridPane.add(PrenomText, 0, 1);     
		      gridPane.add(PrenomField, 1, 1);
		      gridPane.add(PoidsText, 0, 2);
		      gridPane.add(PoidsField, 1, 2);
		      gridPane.add(TailleText, 0, 3);    
		      gridPane.add(TailleField, 1, 3);
		      gridPane.add(RueText, 0, 4);
		      gridPane.add(RueField, 1, 4);
		      gridPane.add(VilleText, 0, 5);
		      gridPane.add(VilleField, 1, 5);
		      gridPane.add(CodePostalText, 0, 6);
		      gridPane.add(CodePostalField, 1, 6);
		      gridPane.add(Save, 0, 7);
		      gridPane.add(Return, 2, 7);
		      Save.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
		      Return.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
		      Save.setOnAction(new EventHandler<ActionEvent>() {
		    	    @Override public void handle(ActionEvent e) {
		    	    	personneDaoSql.create(new Personne(0 ,NomField.getText(), PrenomField.getText(), Float.parseFloat(PoidsField.getText()),Float.parseFloat(TailleField.getText()), RueField.getText(),VilleField.getText(),CodePostalField.getText()));
		    	    }
		    	});
		      Return.setOnAction(new EventHandler<ActionEvent>() {
		            @Override
		            public void handle(ActionEvent event) {
		            	stage.setScene(ListePersonnes(stage));
		            }
		        });
		      NomText.setStyle("-fx-font: normal bold 20px 'serif' "); 
		      PrenomText.setStyle("-fx-font: normal bold 20px 'serif' ");	      
		      PoidsText.setStyle("-fx-font: normal bold 20px 'serif' "); 
		      TailleText.setStyle("-fx-font: normal bold 20px 'serif' ");	      
		      RueText.setStyle("-fx-font: normal bold 20px 'serif' "); 
		      VilleText.setStyle("-fx-font: normal bold 20px 'serif' ");	      
		      CodePostalText.setStyle("-fx-font: normal bold 20px 'serif' "); 
		      gridPane.setStyle("-fx-background-color: #3e7cad;"); 

		      MenuGlobal menuBar = new MenuGlobal();
		      Pane root = new Pane();
		      
		      root.getChildren().addAll(gridPane,menuBar.getMenu(stage));
		      
		      Scene scene = new Scene(root); 
		      stage.setTitle("JAVA Fx Personnes ETNA Ayoub"); 
	    return scene;
	   }
	   protected Scene FormPersonnesUpdate(Stage stage,int id) {
		   	  Personne p = personneDaoSql.findById(id + 1);
		      Text NomText = new Text("Nom");
		      Text PrenomText = new Text("Prenom"); 
		      Text PoidsText = new Text("Poids");
		      Text TailleText = new Text("Taille"); 
		      Text RueText = new Text("Rue");
		      Text VilleText = new Text("Ville"); 
		      Text CodePostalText = new Text("CodePostal");    
		      TextField NomField = new TextField();       
		      TextField PrenomField = new TextField();    
		      TextField PoidsField = new TextField();    
		      TextField TailleField = new TextField();    
		      TextField RueField = new TextField();    
		      TextField VilleField = new TextField();    
		      TextField CodePostalField = new TextField();
		      
		      NomField.setText(p.getNom());
		      PrenomField.setText(p.getPrenom());
		      PoidsField.setText(Float.toString((float) p.getPoids()));
		      TailleField.setText(Float.toString((float)p.getTaille()));
		      RueField.setText(p.getRue());
		      VilleField.setText(p.getVille());
		      CodePostalField.setText(p.getCodePostal());
		      Button Save = new Button("Save"); 
		      Button Return = new Button("Retour"); 
		      Button Delete = new Button("Delete"); 
		      GridPane gridPane = new GridPane();       
		      gridPane.setMinSize(600, 500); 
		      gridPane.setVgap(10); 
		      gridPane.setHgap(10);       
		      gridPane.setAlignment(Pos.CENTER); 
		      gridPane.add(NomText, 0, 0); 
		      gridPane.add(NomField, 1, 0); 
		      gridPane.add(PrenomText, 0, 1);       
		      gridPane.add(PrenomField, 1, 1); 
		      gridPane.add(PoidsText, 0, 2); 
		      gridPane.add(PoidsField, 1, 2); 
		      gridPane.add(TailleText, 0, 3);       
		      gridPane.add(TailleField, 1, 3); 
		      gridPane.add(RueText, 0, 4); 
		      gridPane.add(RueField, 1, 4); 
		      gridPane.add(VilleText, 0, 5);       
		      gridPane.add(VilleField, 1, 5); 
		      gridPane.add(CodePostalText, 0, 6); 
		      gridPane.add(CodePostalField, 1, 6); 
		      gridPane.add(Save, 0, 7); 
		      gridPane.add(Return, 2, 7);
		      gridPane.add(Delete, 1, 7); 
		      Save.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
		      Return.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
		      Delete.setStyle("-fx-font: 22 arial; -fx-base: #b6e7c9;");
		      Save.setOnAction(new EventHandler<ActionEvent>() {
		    	    @Override public void handle(ActionEvent e) {
		    	    	personneDaoSql.update(new Personne(id ,NomField.getText(), PrenomField.getText(), Float.parseFloat(PoidsField.getText()),Float.parseFloat(TailleField.getText()), RueField.getText(),VilleField.getText(),CodePostalField.getText()));
		    	    }
		    	});
		      Return.setOnAction(new EventHandler<ActionEvent>() {
		            @Override
		            public void handle(ActionEvent event) {
		            	stage.setScene(ListePersonnes(stage));
	}
		        });
		      Delete.setOnAction(new EventHandler<ActionEvent>() {
		            @Override
		            public void handle(ActionEvent event) {
		            	personneDaoSql.delete(new Personne(id,NomField.getText(), PrenomField.getText(), Float.parseFloat(PoidsField.getText()),Float.parseFloat(TailleField.getText()), RueField.getText(),VilleField.getText(),CodePostalField.getText()));
			    	    
		            	stage.setScene(ListePersonnes(stage));
	}
		        });
		      NomText.setStyle("-fx-font: normal bold 20px 'serif' "); 
		      PrenomText.setStyle("-fx-font: normal bold 20px 'serif' ");	      
		      PoidsText.setStyle("-fx-font: normal bold 20px 'serif' "); 
		      TailleText.setStyle("-fx-font: normal bold 20px 'serif' ");	      
		      RueText.setStyle("-fx-font: normal bold 20px 'serif' "); 
		      VilleText.setStyle("-fx-font: normal bold 20px 'serif' ");	      
		      CodePostalText.setStyle("-fx-font: normal bold 20px 'serif' "); 
		      gridPane.setStyle("-fx-background-color: #3e7cad;"); 
		      

		      MenuGlobal menuBar = new MenuGlobal();
		      Pane root = new Pane();
		      
		      root.getChildren().addAll(gridPane,menuBar.getMenu(stage));
		      
		      
		      Scene scene = new Scene(root); 
		      stage.setTitle("JAVA Fx Personnes ETNA Ayoub"); 
	       return scene;
	   }
}
