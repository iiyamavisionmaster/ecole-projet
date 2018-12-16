package com.cours.entities;

import java.util.Comparator;

public class Tasks {	
	public Tasks(int idTasks, String name, String coms, String start, String end) {
		this.idTasks = idTasks;
		this.name = name;
		this.coms = coms ;
		this.start = start ;
		this.end = end ;
	}
	public Tasks() {
	}
	public static Comparator<Tasks> sortByNameDesc = new Comparator<Tasks>() {

	public int compare(Tasks a1, Tasks a2) {

	   String Tasks1 = a1.getName();
	   String Tasks2 = a2.getName();

	   /*desc*/
	   return Tasks2.compareTo(Tasks1);
	}};	
	private int idTasks;
	private String name;
	private String coms;
	private String start;
	private String end;
	
	
	public int getIdTasks() {
		return idTasks;
	}
	public void setIdTasks(int idTasks) {
		this.idTasks = idTasks;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public String getComs() {
		return coms;
	}
	public void setComs(String coms) {
		this.coms = coms;
	}
	public String getStart() {
		return start;
	}
	public void setStart(String start) {
		this.start = start;
	}
	public String getEnd() {
		return end;
	}
	public void setEnd(String end) {
		this.end = end;
	}
	
}



    	    
