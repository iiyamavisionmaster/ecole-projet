package application;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.nio.file.StandardOpenOption;
import java.nio.file.StandardWatchEventKinds;
import java.nio.file.WatchEvent;
import java.nio.file.WatchKey;
import java.nio.file.WatchService;
import java.nio.file.WatchEvent.Kind;
import java.util.List;
import java.util.concurrent.Executors;
import java.util.concurrent.TimeUnit;

import javafx.application.Application;
import views.ContactsV;
import javafx.scene.control.Alert; 
import javafx.stage.Stage;
import javafx.stage.Window;
public class Main extends Application { 
   @Override 
   public void start(Stage stage) {

       Executors.newScheduledThreadPool(1).scheduleAtFixedRate(new Runnable()
       {
       	public void run()
       {
	   File file = new File(System.getProperty("user.dir") + "\\projets");
	   Path path = file.toPath();
       if (file.isDirectory()) {
           WatchService ws = null;
			try {
				ws = path.getFileSystem().newWatchService();
				path.register(ws, StandardWatchEventKinds.ENTRY_CREATE, 
						StandardWatchEventKinds.ENTRY_DELETE, StandardWatchEventKinds.ENTRY_MODIFY);
			} catch (IOException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
           WatchKey watch = null;
           while (true) {
               System.out.println("Watching directory: " + file.getPath());
               try {
                   watch = ws.take();
               } catch (InterruptedException ex) {
                   System.err.println("Interrupted");
               }
               List<WatchEvent<?>> events = watch.pollEvents();
               watch.reset();
               for (WatchEvent<?> event : events) {
                   Kind<Path> kind = (Kind<Path>) event.kind();
                   Path context = (Path) event.context();
                   try {
                	   BufferedReader br = new BufferedReader(new FileReader(new File(System.getProperty("user.dir") + "\\log\\logProjets.txt")));
                   
                	    String logText = null;
                        if (kind.equals(StandardWatchEventKinds.OVERFLOW)) {
                        	logText = "OVERFLOW";
                        } else if (kind.equals(StandardWatchEventKinds.ENTRY_CREATE)) {
                            
                        	logText = "Created: " + context.getFileName();
                            
                        } else if (kind.equals(StandardWatchEventKinds.ENTRY_DELETE)) {
                        	logText = "Deleted: "  + context.getFileName();
                        } else if (kind.equals(StandardWatchEventKinds.ENTRY_MODIFY)) {
                        	logText = "Modified: "  + context.getFileName();
                        }
                        logText += System.getProperty("line.separator");
                        Files.write(Paths.get(System.getProperty("user.dir") + "\\log\\logProjets.txt"), logText.getBytes(), StandardOpenOption.APPEND);

                	}catch (IOException e) {
                	    //exception handling left as an exercise for the reader
                	}
               }
           }
       } else {
           System.err.println("Not a directory. Will exit.");
       }

       } }, 0, 1, TimeUnit.SECONDS);
	   ContactsV contactView = new ContactsV();
	   	stage.setWidth(600);
	   	stage.setHeight(500);
	      stage.setScene(contactView.getLoginScene(stage));
	      
	      stage.show(); 
   }      
   public static void main(String args[]){ 
      launch(args); 
   } 



   private void showAlert(Alert.AlertType alertType, Window owner, String title, String message) {
       Alert alert = new Alert(alertType);
       alert.setTitle(title);
       alert.setHeaderText(null);
       alert.setContentText(message);
       alert.initOwner(owner);
       alert.show();
   }


}
