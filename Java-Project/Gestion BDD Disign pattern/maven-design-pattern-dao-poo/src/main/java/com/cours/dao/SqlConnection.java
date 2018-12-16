/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.cours.dao;

import com.cours.utils.Constants;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

/**
 *
 * @author ElHadji
 */
public class SqlConnection {

    public final static String className = SqlConnection.class.getName();
    // Url de connexion en base de donnée
    private static String url = Constants.DATABASE_URL;

    // Utilisateur de la base de données
    private static String user = Constants.DATABASE_USER;

    // Mot de passe de la base de données
    private static String password = Constants.DATABASE_PASSWORD;

    // Drivers Jdbc
    private static String jdbcDriver = Constants.JDBC_DRIVER;

    // Objet Connection
    private static Connection connection;


    public static synchronized Connection getInstance() {
        try {
            Class.forName(jdbcDriver);
            try {
            	connection = DriverManager.getConnection(url, user, password);
            } catch (SQLException ex) {
                // log an exception. fro example:
                System.out.println("Failed to create the database connection."); 
            }
        } catch (ClassNotFoundException ex) {
            // log an exception. for example:
            System.out.println("Driver not found."); 
        }
        return connection;
    }

    public static void closeSqlResources(PreparedStatement preparedStatement, ResultSet result) {
        String methodName = "closeSqlResources";

    }
}
