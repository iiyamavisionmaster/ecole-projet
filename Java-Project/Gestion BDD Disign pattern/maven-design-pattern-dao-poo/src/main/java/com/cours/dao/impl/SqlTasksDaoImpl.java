package com.cours.dao.impl;

import com.cours.dao.ITasksDao;
import com.cours.dao.IPersonneDao;
import com.cours.dao.SqlConnection;
import com.cours.dao.factory.AbstractDaoFactory;
import com.cours.dao.factory.FactoryType;
import com.cours.entities.Tasks;
import com.cours.entities.Personne;

import java.io.File;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

import org.json.simple.JSONObject;

public class SqlTasksDaoImpl implements ITasksDao {
	IPersonneDao personneDaoSql = (IPersonneDao) AbstractDaoFactory.getDaoFactory(FactoryType.SQL_DAO).getPersonneDao();
	
    public final static String className = SqlTasksDaoImpl.class.getName();
    /**
     * L'instance de connexion à la database
     */

    public Connection connection = SqlConnection.getInstance();

    @Override
    public Tasks findById(int idTasks) {
   		return this.findAll().get(idTasks - 1);
    }

    @Override
    public Tasks update(Tasks obj) {

    	List<Tasks> Taskss = new ArrayList<Tasks>();
    	Statement stmt;
		try {
			stmt = this.connection.createStatement();
			int rs = stmt.executeUpdate("UPDATE `Tasks` SET name=\'"+obj.getName()+"\',coms=\'"+obj.getComs()+"\',start=\'"+obj.getStart()+"\',end=\'"+obj.getEnd()+ "\';");
	    	} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	return obj;
    }

    @Override
    public Tasks create(Tasks obj) {

    	List<Tasks> Taskss = new ArrayList<Tasks>();
    	Statement stmt;
		try {
			stmt = this.connection.createStatement();
			 int rs = stmt.executeUpdate("INSERT INTO `Tasks`( `name`, `coms`, `start`, `end`) VALUES (\'"+obj.getName()+"\',\'"+obj.getComs()+"\',\'"+obj.getStart()+"\',\'"+obj.getEnd()+"\');");
			} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	return obj;
    }

    @Override
    public boolean delete(Tasks person) {

    	Statement stmt;
		try {
			stmt = this.connection.createStatement();
			int rs = stmt.executeUpdate("DELETE FROM Tasks WHERE id=" + person.getIdTasks());
			int rs2 = stmt.executeUpdate("UPDATE personne AS t1\r\n" + 
					"JOIN (\r\n" + 
					"SELECT IdPersonne, @newID := @newID + 1 AS newID\r\n" + 
					"FROM personne\r\n" + 
					"JOIN (SELECT @newID := -1) AS vars\r\n" + 
					"ORDER BY IdPersonne) AS new ON t1.IdPersonne = new.IdPersonne\r\n" + 
					"SET t1.IdPersonne = new.newID;");
	        return true;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
	        return false;
		}
    }

    @Override
    public List<Tasks> findAll() {
    	List<Tasks> Taskss = new ArrayList<Tasks>();
    	Statement stmt;
		try {
			stmt = this.connection.createStatement();
			int rs2 = stmt.executeUpdate("UPDATE Tasks AS t1\r\n" + 
					"JOIN (\r\n" + 
					"SELECT id, @newID := @newID + 1 AS newID\r\n" + 
					"FROM Tasks\r\n" + 
					"JOIN (SELECT @newID := -1) AS vars\r\n" + 
					"ORDER BY id) AS new ON t1.id = new.id\r\n" + 
					"SET t1.id = new.newID;");
			ResultSet rs = stmt.executeQuery("select * from Tasks");

     	   while (rs.next()){ 

    	        Tasks returnedTasks = new Tasks();
    	        returnedTasks.setIdTasks(rs.getInt("id"));
    			returnedTasks.setName(rs.getString("name"));
    			returnedTasks.setComs(rs.getString("coms"));
    			
    			returnedTasks.setStart(rs.getString("start"));
    			returnedTasks.setEnd(rs.getString("end"));
     		   Taskss.add(returnedTasks);
				}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	return Taskss;
    }
}