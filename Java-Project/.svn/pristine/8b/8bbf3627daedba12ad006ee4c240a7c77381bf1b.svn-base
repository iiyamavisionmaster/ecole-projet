package com.cours.dao.factory;

import com.cours.dao.IGroupsDao;
import com.cours.dao.IPersonneDao;
import com.cours.dao.IProjetDao;
import com.cours.dao.ITasksDao;
import com.cours.dao.impl.SqlGroupsDaoImpl;
import com.cours.dao.impl.SqlPersonneDaoImpl;
import com.cours.dao.impl.SqlProjetDaoImpl;
import com.cours.dao.impl.SqlTasksDaoImpl;

public class SqlDaoFactory extends AbstractDaoFactory
{

    @Override
    public IPersonneDao getPersonneDao()
    {
        return (new SqlPersonneDaoImpl());
    }
    @Override
    public IProjetDao getProjetDao()
    {
        return (new SqlProjetDaoImpl());
    }
	@Override
	public IGroupsDao getGroupsDao() {
		return (new SqlGroupsDaoImpl());
	}
	@Override
	public ITasksDao getTasksDao() {
		return (new SqlTasksDaoImpl());
	}
}
