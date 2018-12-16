package views;

import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.scene.control.Menu;
import javafx.scene.control.MenuBar;
import javafx.scene.control.MenuItem;
import javafx.stage.Stage;
import views.ContactsV;

public class MenuGlobal {
	public MenuGlobal() {
		
	}
	public MenuBar getMenu(Stage stage) {
		MenuBar menuBar = new MenuBar();
	      
	      // Create menus
	      Menu fileMenu = new Menu("File");
	      Menu editMenu = new Menu("Edit");
	      Menu helpMenu = new Menu("Help");
	      
	      // Create MenuItems
	      MenuItem DashbordButton = new MenuItem("Dashbord");
	      MenuItem TasksButton = new MenuItem("Tasks");
	      MenuItem QuitterButton = new MenuItem("Quitter");

	      MenuItem UsersButton = new MenuItem("Users");
	      MenuItem GroupsButton = new MenuItem("Groups");
	      UsersButton.setOnAction(new EventHandler<ActionEvent>() {
	    	    @Override
	    	    public void handle(ActionEvent event) {
	    	    	stage.setScene(new ContactsV().ListePersonnes(stage));
	    	    }
	    	});
	      DashbordButton.setOnAction(new EventHandler<ActionEvent>() {
	    	    @Override
	    	    public void handle(ActionEvent event) {
	    	    	stage.setScene(new DashboardProjetV().getDashboardScene(stage));
	    	    }
	    	});
	      GroupsButton.setOnAction(new EventHandler<ActionEvent>() {
	    	    @Override
	    	    public void handle(ActionEvent event) {
	    	    	stage.setScene(new GroupsV().getDashboardScene(stage));
	    	    }
	    	});
	      TasksButton.setOnAction(new EventHandler<ActionEvent>() {
	    	    @Override
	    	    public void handle(ActionEvent event) {
	    	    	stage.setScene(new TasksV().getDashboardScene(stage));
	    	    }
	    	});
	      QuitterButton.setOnAction(new EventHandler<ActionEvent>() {
	    	    @Override
	    	    public void handle(ActionEvent event) {
	    	    	System.exit(0);
	    	    }
	    	});
	      // Add menuItems to the Menus
	      fileMenu.getItems().addAll(DashbordButton,TasksButton, QuitterButton);
	      editMenu.getItems().addAll( UsersButton, GroupsButton );
	      
	      // Add Menus to the MenuBar
	      menuBar.getMenus().addAll(fileMenu, editMenu, helpMenu);
	      menuBar.prefWidthProperty().bind(stage.widthProperty());
		return menuBar;
	}
}
