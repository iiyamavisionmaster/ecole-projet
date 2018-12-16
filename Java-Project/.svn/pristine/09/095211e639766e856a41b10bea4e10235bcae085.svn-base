package com.cours.dao.impl;

import com.cours.dao.IPersonneDao;
import com.cours.entities.Personne;
import com.cours.utils.DaoHelper;
import java.util.List;

public class ManualPersonneDaoImpl implements IPersonneDao {

    /**
     * La liste de personnes
     */
    private List<Personne> listePersonnes;

    /**
     * Constructeur
     */
    public ManualPersonneDaoImpl() {
        this.listePersonnes = DaoHelper.getListDataSource();

    }

    @Override
    public Personne findById(int idPersonne) {
    	return this.listePersonnes.get(idPersonne);
    }

    @Override
    public Personne update(Personne obj) {
    	this.listePersonnes.get(obj.getIdPersonne()).setIdPersonne(obj.getIdPersonne());
    	this.listePersonnes.get(obj.getIdPersonne()).setPrenom(obj.getPrenom());
    	this.listePersonnes.get(obj.getIdPersonne()).setNom(obj.getNom());
    	this.listePersonnes.get(obj.getIdPersonne()).setPoids(obj.getPoids());
    	this.listePersonnes.get(obj.getIdPersonne()).setTaille(obj.getTaille());
    	this.listePersonnes.get(obj.getIdPersonne()).setRue(obj.getRue());
    	this.listePersonnes.get(obj.getIdPersonne()).setVille(obj.getVille());
        this.listePersonnes.get(obj.getIdPersonne()).setCodePostal(obj.getCodePostal());
        return obj;
    }

    @Override
    public Personne create(Personne obj) {
    	obj.setIdPersonne(this.listePersonnes.size()+1);
    	this.listePersonnes.add(obj);
        return obj;
    }

    @Override
    public boolean delete(Personne person) {
    	this.listePersonnes.remove(person.getIdPersonne());
        return true;
    }

    @Override
    public List<Personne> findAll() {
        return this.listePersonnes;
    }
}
