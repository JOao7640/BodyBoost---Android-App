package com.example.bodyboost.Report_classes;

import androidx.room.Dao;
import androidx.room.Delete;
import androidx.room.Insert;
import androidx.room.Query;
import androidx.room.Update;

import java.util.List;

@Dao
public interface ReportDao {

    @Query("SELECT * FROM report ORDER BY date ASC")
    List<Report> getAll();

    @Insert
    void insert(Report report);

    @Update
    void update(Report report);


}
