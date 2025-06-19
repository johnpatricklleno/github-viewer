import { useParams, Link } from 'react-router-dom';
import { useEffect, useState } from 'react';
import { fetchIssue } from '../api';
import { Issue } from '../types';

export default function IssueDetail() {
  const { owner, repo, number } = useParams();
  const [issue, setIssue] = useState<Issue | null>(null);

  useEffect(() => {
    if (owner && repo && number) {
      fetchIssue(owner, repo, number).then(setIssue);
    }
  }, [owner, repo, number]);

  if (!issue) return <div className="text-gray-600">Loading...</div>;

  return (
    <div className="p-6 bg-white rounded shadow text-black ">
      <Link to="/issues" className="text-blue-500 hover:underline block mb-4">← Back to Issues</Link>

      <h2 className="text-2xl font-bold mb-2">#{issue.number} – {issue.title}</h2>
      <div className="text-sm text-gray-500 mb-4">
        Created: {new Date(issue.created_at).toLocaleString()}
      </div>

      <p className="prose max-w-none">{issue.body || 'No description provided.'}</p>
    </div>
  );
}
