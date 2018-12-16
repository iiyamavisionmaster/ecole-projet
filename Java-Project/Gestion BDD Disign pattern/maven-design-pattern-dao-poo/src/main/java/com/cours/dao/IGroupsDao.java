package com.cours.dao;

import com.cours.entities.Groups;

import java.util.List;

public interface IGroupsDao {

    public List<Groups> findAll();

    public Groups findById(int id);

    public Groups create(Groups p);

    public Groups update(Groups p);

    public boolean delete(Groups p);
}
