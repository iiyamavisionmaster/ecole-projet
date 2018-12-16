package com.cours.dao.impl;

import com.cours.dao.IGroupsDao;
import com.cours.dao.IProjetDao;
import com.cours.dao.ITasksDao;
import com.cours.dao.SqlConnection;
import com.cours.dao.factory.AbstractDaoFactory;
import com.cours.entities.Groups;
import com.cours.entities.Projet;
import com.cours.entities.Tasks;

import java.io.File;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

import com.cours.dao.factory.FactoryType;
import org.json.simple.JSONObject;

public class SqlProjetDaoImpl implements IProjetDao {
	IGroupsDao GroupsDaoSql = (IGroupsDao) AbstractDaoFactory.getDaoFactory(FactoryType.SQL_DAO).getGroupsDao();
	ITasksDao TasksDaoSql = (ITasksDao) AbstractDaoFactory.getDaoFactory(FactoryType.SQL_DAO).getTasksDao();
    public final static String className = SqlProjetDaoImpl.class.getName();
    /**
     * L'instance de connexion à la database
     */

    public Connection connection = SqlConnection.getInstance();

    @Override
    public Projet findById(int idProjet) {
   		return this.findAll().get(idProjet - 1);
    }

    @Override
    public Projet update(Projet obj) {
        new File( System.getProperty("user.dir") + "\\projets\\" + this.findById(obj.getIdProjet()).getName()).renameTo(new File( System.getProperty("user.dir") + "\\projets\\" + obj.getName()) );
    	List<Projet> Projets = new ArrayList<Projet>();
    	Statement stmt;
		try {
			stmt = this.connection.createStatement();

			List<Groups> groups = GroupsDaoSql.findAll();
			String GroupsIds = obj.getGroupId();
			String[] parts = GroupsIds.split(",");
			String regroupedPartsGroup = ""; 
			for(int i = 0; i<=parts.length - 1;i++) {
				for(int j = 0; j<=groups.size() - 1;j++) {
					if(parts[i].equals(groups.get(j).getName())) {
						regroupedPartsGroup += groups.get(j).getName() + ',';
					}
				}
			}			
			List<Tasks> Tasks = TasksDaoSql.findAll();
			String TasksIds = obj.gettacheId();
			String[] partsTasks = TasksIds.split(",");
			String regroupedPartsTasks = ""; 
			for(int i = 0; i<=partsTasks.length - 1;i++) {
				for(int j = 0; j<=Tasks.size() - 1;j++) {
					if(parts[i].equals(Tasks.get(j).getName())) {
						regroupedPartsTasks += Tasks.get(j).getName() + ',';
					}
				}
			}

	    	System.out.println("UPDATE `Projet` SET name=\'"+obj.getName()+"\',coms=\'"+obj.getComs()+"\',groupId=\'"+regroupedPartsGroup+"\',tacheId=\'"+regroupedPartsTasks + "\'WHERE id=\'"+obj.getIdProjet()+"\';");
			int rs = stmt.executeUpdate("UPDATE `Projet` SET name=\'"+obj.getName()+"\',coms=\'"+obj.getComs()+"\',groupId=\'"+regroupedPartsGroup+"\',tacheId=\'"+regroupedPartsTasks + "\'WHERE id=\'"+obj.getIdProjet()+"\';");
	    	} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	return obj;
    }

    @Override
    public Projet create(Projet obj) {

        new File( System.getProperty("user.dir") + "\\projets\\" + obj.getName()).mkdirs();
    	List<Projet> Projets = new ArrayList<Projet>();
    	Statement stmt;
		try {
			stmt = this.connection.createStatement();

			int rs = stmt.executeUpdate("UPDATE Projet AS t1\r\n" + 
					"JOIN (\r\n" + 
					"SELECT id, @newID := @newID + 1 AS newID\r\n" + 
					"FROM Projet\r\n" + 
					"JOIN (SELECT @newID := -1) AS vars\r\n" + 
					"ORDER BY id) AS new ON t1.id = new.id\r\n" + 
					"SET t1.id = new.newID;");
			List<Groups> groups = GroupsDaoSql.findAll();
			String GroupsIds = obj.getGroupId();
			String[] parts = GroupsIds.split(",");
			String regroupedPartsGroup = ""; 
			for(int i = 0; i<=parts.length - 1;i++) {
				for(int j = 0; j<=groups.size() - 1;j++) {
					if(parts[i].equals(groups.get(j).getName())) {
						regroupedPartsGroup += groups.get(j).getName() + ',';
					}
				}
			}			
			List<Tasks> Tasks = TasksDaoSql.findAll();
			String TasksIds = obj.gettacheId();
			String[] partsTasks = TasksIds.split(",");
			String regroupedPartsTasks = ""; 
			for(int i = 0; i<=partsTasks.length - 1;i++) {
				for(int j = 0; j<=Tasks.size() - 1;j++) {
					if(partsTasks[i].equals(Tasks.get(j).getName())) {
						System.out.println(Tasks.get(j).getName());
						regroupedPartsTasks += Tasks.get(j).getName() + ',';
					}
				}
			}
			System.out.println("INSERT INTO `Projet`( `name`, `coms`, `groupId`, `tacheId`) VALUES (\'"+obj.getName()+"\',\'"+obj.getComs()+"\',\'"+regroupedPartsGroup+"\',\'"+regroupedPartsTasks+"\');");
			 rs = stmt.executeUpdate("INSERT INTO `Projet`( `name`, `coms`, `groupId`, `tacheId`) VALUES (\'"+obj.getName()+"\',\'"+obj.getComs()+"\',\'"+regroupedPartsGroup+"\',\'"+regroupedPartsTasks+"\');");
			} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	return obj;
    }

    @Override
    public boolean delete(Projet person) {

        new File( System.getProperty("user.dir") + "\\projets\\" + person.getName()).delete();
    	Statement stmt;
		try {
			stmt = this.connection.createStatement();
			int rs = stmt.executeUpdate("DELETE FROM Projet WHERE id=" + person.getIdProjet());
			rs = stmt.executeUpdate("UPDATE Projet AS t1\r\n" + 
					"JOIN (\r\n" + 
					"SELECT id, @newID := @newID + 1 AS newID\r\n" + 
					"FROM Projet\r\n" + 
					"JOIN (SELECT @newID := -1) AS vars\r\n" + 
					"ORDER BY id) AS new ON t1.id = new.id\r\n" + 
					"SET t1.id = new.newID;");
	        return true;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
	        return false;
		}
    }

    @Override
    public List<Projet> findAll() {
    	List<Projet> Projets = new ArrayList<Projet>();
    	Statement stmt;
		try {
			stmt = this.connection.createStatement();
			int rs2 = stmt.executeUpdate("UPDATE Projet AS t1\r\n" + 
					"JOIN (\r\n" + 
					"SELECT id, @newID := @newID + 1 AS newID\r\n" + 
					"FROM Projet\r\n" + 
					"JOIN (SELECT @newID := -1) AS vars\r\n" + 
					"ORDER BY id) AS new ON t1.id = new.id\r\n" + 
					"SET t1.id = new.newID;");
			ResultSet rs = stmt.executeQuery("select * from Projet");

     	   while (rs.next()){ 

    	        Projet returnedProjet = new Projet();
    	        returnedProjet.setIdProjet(rs.getInt("id"));
    			returnedProjet.setName(rs.getString("name"));
    			returnedProjet.setComs(rs.getString("coms"));
    			returnedProjet.setGroupId(rs.getString("groupId"));
    			returnedProjet.settacheId(rs.getString("tacheId"));
     		   Projets.add(returnedProjet);
				}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	return Projets;
    }
}
