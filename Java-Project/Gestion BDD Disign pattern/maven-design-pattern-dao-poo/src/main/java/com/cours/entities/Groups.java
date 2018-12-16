 package com.cours.entities;

import java.util.Comparator;

public class Groups {	
	public Groups(int idGroups, String name, String coms, String personneId) {
		this.idGroups = idGroups;
		this.name = name;
		this.coms = coms ;
		this.personneId = personneId;
	}
	public Groups() {
	}
	public static Comparator<Groups> sortByNameDesc = new Comparator<Groups>() {

	public int compare(Groups a1, Groups a2) {

	   String Groups1 = a1.getName();
	   String Groups2 = a2.getName();

	   /*desc*/
	   return Groups2.compareTo(Groups1);
	}};	
	private int idGroups;
	private String name;
	private String coms;
	private String personneId;
	
	
	
	public int getIdGroups() {
		return idGroups;
	}
	public void setIdGroups(int idGroups) {
		this.idGroups = idGroups;
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
	public String getPersonneId() {
		return personneId;
	}
	public void setPersonneId(String personneId) {
		this.personneId = personneId;
	}
	
}