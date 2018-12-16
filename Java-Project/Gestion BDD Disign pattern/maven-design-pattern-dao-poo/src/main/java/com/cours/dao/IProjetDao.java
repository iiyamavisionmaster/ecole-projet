package com.cours.dao;

import com.cours.entities.Projet;

import java.util.List;

public interface IProjetDao {

    public List<Projet> findAll();

    public Projet findById(int id);

    public Projet create(Projet p);

    public Projet update(Projet p);

    public boolean delete(Projet p);
}
