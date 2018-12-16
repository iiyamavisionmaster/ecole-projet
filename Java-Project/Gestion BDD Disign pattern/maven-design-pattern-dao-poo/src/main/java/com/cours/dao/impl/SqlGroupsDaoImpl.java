package com.cours.dao.impl;

import com.cours.dao.IGroupsDao;
import com.cours.dao.IPersonneDao;
import com.cours.dao.SqlConnection;
import com.cours.dao.factory.AbstractDaoFactory;
import com.cours.dao.factory.FactoryType;
import com.cours.entities.Groups;
import com.cours.entities.Personne;

import java.io.File;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

import org.json.simple.JSONObject;

public class SqlGroupsDaoImpl implements IGroupsDao {
	IPersonneDao personneDaoSql = (IPersonneDao) AbstractDaoFactory.getDaoFactory(FactoryType.SQL_DAO).getPersonneDao();
	
    public final static String className = SqlGroupsDaoImpl.class.getName();
    /**
     * L'instance de connexion à la database
     */

    public Connection connection = SqlConnection.getInstance();

    @Override
    public Groups findById(int idGroups) {
   		return this.findAll().get(idGroups - 1);
    }

    @Override
    public Groups update(Groups obj) {

    	List<Groups> Groupss = new ArrayList<Groups>();
    	Statement stmt;
		try {
			stmt = this.connection.createStatement();
			List<Personne> personnes = personneDaoSql.findAll();
			String personneIds = obj.getPersonneId();
			String[] parts = personneIds.split(",");
			String regroupedParts = ""; 
			for(int i = 0; i<=parts.length - 1;i++) {
				for(int j = 0; j<=personnes.size() - 1;j++) {
					if(parts[i].equals(personnes.get(j).getNom())) {
						System.out.println(personnes.get(j).getNom());
		    			regroupedParts += personnes.get(j).getNom() + ',';
					}
				}
			}
			System.out.println("UPDATE `Groups` SET name=\'"+obj.getName()+"\',coms=\'"+obj.getComs()+"\',personneId=\'"+regroupedParts+ "\' WHERE id=\'"+obj.getIdGroups()+"\';");
			int rs = stmt.executeUpdate("UPDATE `Groups` SET name=\'"+obj.getName()+"\',coms=\'"+obj.getComs()+"\',personneId=\'"+regroupedParts+ "\' WHERE id=\'"+obj.getIdGroups()+"\';");
	    	} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	return obj;
    }

    @Override
    public Groups create(Groups obj) {

    	List<Groups> Groupss = new ArrayList<Groups>();
    	Statement stmt;
		try {
			stmt = this.connection.createStatement();
			List<Personne> personnes = personneDaoSql.findAll();
			String personneIds = obj.getPersonneId();
			String[] parts = personneIds.split(",");
			String regroupedParts = ""; 
			for(int i = 0; i<=parts.length - 1;i++) {
				for(int j = 0; j<=personnes.size() - 1;j++) {
					if(parts[i].equals(personnes.get(j).getNom())) {
		    			regroupedParts += personnes.get(j).getNom() + ',';
					}
				}
			}
			 int rs = stmt.executeUpdate("INSERT INTO `Groups`( `name`, `coms`, `personneId`) VALUES (\'"+obj.getName()+"\',\'"+obj.getComs()+"\',\'"+regroupedParts+"\');");
			} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	return obj;
    }

    @Override
    public boolean delete(Groups person) {

    	Statement stmt;
		try {
			stmt = this.connection.createStatement();
			int rs = stmt.executeUpdate("DELETE FROM Groups WHERE id=" + person.getIdGroups());
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
    public List<Groups> findAll() {
    	List<Groups> Groupss = new ArrayList<Groups>();
    	Statement stmt;
		try {
			stmt = this.connection.createStatement();
			int rs2 = stmt.executeUpdate("UPDATE groups AS t1\r\n" + 
					"JOIN (\r\n" + 
					"SELECT id, @newID := @newID + 1 AS newID\r\n" + 
					"FROM groups\r\n" + 
					"JOIN (SELECT @newID := -1) AS vars\r\n" + 
					"ORDER BY id) AS new ON t1.id = new.id\r\n" + 
					"SET t1.id = new.newID;");
			ResultSet rs = stmt.executeQuery("select * from groups");

     	   while (rs.next()){ 

    	        Groups returnedGroups = new Groups();
    	        returnedGroups.setIdGroups(rs.getInt("id"));
    			returnedGroups.setName(rs.getString("name"));
    			returnedGroups.setComs(rs.getString("coms"));
    			
    			returnedGroups.setPersonneId(rs.getString("personneId"));
     		   Groupss.add(returnedGroups);
				}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	return Groupss;
    }
}